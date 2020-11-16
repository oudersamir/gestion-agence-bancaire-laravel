<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compte_epargne;

use DB;
class ClientSearch extends Controller
{
    
    function index()
    {
     return view('client_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('clients')
         ->join('comptes','comptes.client_id_client','=','clients.id_client')
          ->whereNull('clients.deleted_at')
          ->where(function($query1) use ($query) {
          $query1->where('prenom', 'like', '%'.$query.'%')
         ->orWhere('nom', 'like', '%'.$query.'%')
         ->orWhere('tel', 'like', '%'.$query.'%')
         ->orWhere('cin', 'like', '%'.$query.'%')
         ->orWhere('adresse', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%');
})
          ->orderBy('id_client', 'desc')

         ->get();

         
      }
      else
      {
       $data = DB::table('clients')
         ->join('comptes','comptes.client_id_client','=','clients.id_client')
                  ->whereNull('clients.deleted_at')

         ->orderBy('id_client', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td><h4><b>'.$row->nom.'</b></h4></td>
           <td><h4><b>'. $row->prenom.'</b></h4></td>
            <td><h4><b>'. $row->tel.'</b></h4></td>
           <td><h4><b>'. $row->cin.'</b></h4></td>

           <td><h4><b>'. $row->adresse.'</b></h4></td>
            <td><h4><b>'.$row->email.'</b></h4></td>
           <td><h4><b>'.$row->num_comptes.'</b></h4></td>
           <td  style="width:50px;overflow:auto"> <form action="'.url('Clients/'.$row->id_client).'" method="post"> 
'. csrf_field() .'
                       
       <input type="hidden" name="_method" value="DELETE">

               
     <a href="'.url('Clients').'"  class="btn btn-info">Detail</a>

                     <a href="'.url('Clients/'.$row->id_client.'/Edit_Client').'"  class="btn btn-success">Editer</a>
                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form> </td></tr>';
}
      }
      else
      {
       $output = '
      
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }





    function action2(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('comptes')
        ->join('clients','clients.id_client','=','comptes.client_id_client')
          ->whereNull('clients.deleted_at')
        ->whereNull('comptes.deleted_at')
          ->where(function($query1) use ($query) {
        $query1 ->where('prenom', '=', ''.$query.'')
         ->orWhere('nom', '=', ''.$query.'')
         ->orWhere('num_comptes', '=', ''.$query.'')
         ->orWhere('tel', '=', ''.$query.'')
         ->orWhere('cin', '=', ''.$query.'')
         ->orWhere('adresse', '=', ''.$query.'')
         ->orWhere('email', '=', ''.$query.'')
          ->orderBy('client_id_client', 'desc');
      })

         ->get();
         
         
      }
      else
      {
       $data = DB::table('comptes')
        ->join('clients','clients.id_client','=','comptes.client_id_client')
       
        ->whereNull('comptes.deleted_at') 
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '       <h1>   Compte de  '." ".$row->prenom." ".$row->nom." ".$row->cin.'</h1> 

        Num Compte : '.$row->num_comptes.'
            
 
             ';
       }
      }
      else
      {
      
       $output = '
      
       ';
       
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }




     function action3(Request $request)
    {
     if($request->ajax())
     {
      $output = '  <head>
      <tr> 
                <th>Num Compte Courant</th>
                <th>Date Ouverture</th>
                <th>Nom et Prenom</th>
                 <th>Action</th>


      </tr>
    </head> 

   
        <tbody >

        
        ';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('compte_courants')
         ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
         ->whereNull('compte_courants.deleted_at')
          ->where(function($query1) use ($query) {
        $query1 ->where('prenom', '=', ''.$query.'')
         ->orWhere('num_comptes', '=', ''.$query.'')
         ->orWhere('nom', '=', ''.$query.'')
         ->orWhere('tel', '=', ''.$query.'')
         ->orWhere('cin', '=', ''.$query.'')
         ->orWhere('adresse', '=', ''.$query.'')
         ->orWhere('email', '=', ''.$query.'')
          ->orderBy('client_id_client', 'desc');
      })

         ->get();
         
         
      }
      else
      {
       $data ='';
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id_compte_courant.'</td>
           <td>'. $row->compte_id_comptes.'</td>
           <td>'. $row->solde.'</td> 


<td> <form action="'.url('Compte_courant/'.$row->id_compte_courant).'" method="post">
                    '. csrf_field() .'
                       
       <input type="hidden" name="_method" value="DELETE">
                     <a href="'.url('Comptes').'"  class="btn btn-info">Detail</a>

                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form> </tr>  ';
       }
              $output .= '</tbody>';

      }
      else
      {
       $output = '
       
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }





     function action4(Request $request)
    {
     if($request->ajax())
     {
      $output = '
        ';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('compte_epargnes')
         ->join('comptes','comptes.id_comptes','=','compte_epargnes.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
             ->select('compte_epargnes.prenom as monprenom','compte_epargnes.created_at','id_compte_epargnes','compte_id_comptes','solde')

          ->whereNull('compte_epargnes.deleted_at')
          ->where(function($query1) use ($query) {
        $query1 ->where('compte_epargnes.prenom', '=', ''.$query.'')
                 ->orWhere('num_comptes', '=', ''.$query.'')

         ->orWhere('nom', '=', ''.$query.'')
         ->orWhere('tel', '=', ''.$query.'')
         ->orWhere('cin', '=', ''.$query.'')
         ->orWhere('adresse', '=', ''.$query.'')
         ->orWhere('email', '=', ''.$query.'')
          ->orderBy('client_id_client', 'desc');
      })


         ->get();
         
   $data2 = DB::table('compte_courants')
         ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')

         ->whereNull('compte_courants.deleted_at')
          ->where(function($query1) use ($query) {
        $query1 ->where('prenom', '=', ''.$query.'')
         ->orWhere('num_comptes', '=', ''.$query.'')
         ->orWhere('nom', '=', ''.$query.'')
         ->orWhere('tel', '=', ''.$query.'')
         ->orWhere('cin', '=', ''.$query.'')
         ->orWhere('adresse', '=', ''.$query.'')
         ->orWhere('email', '=', ''.$query.'')
          ->orderBy('client_id_client', 'desc');
      })

         ->get();
         
      }
      else
      {
       $data ='';
       $data2 ='';
      }
      $total_row = $data->count();
      $total_row2 = $data2->count();
  
     $test=0;


if($total_row2 > 0){

foreach($data2 as $row)
       {
$output .=  '<table class="table"><tr><td><h1>Compte</h1><h4> References  : '.$row->nom.'  '.$row->prenom.' ('.$row->cin.') / Num Compte : '.$row->num_comptes.'<h4></td></tr></table>';
       }
$output .=  '


<table class="table"><thead class="thead-dark">
      <tr>   <th></th>
                <th>Nom</th>
                <th>Date Ouverture</th>
                <th>Solde</th>
                 <th>Action</th>


      </tr>
    </thead> <tr> <td><h4><b>Compte courant</b></h4></td>';
 
       foreach($data2 as $row)
       {
        $output .= '
        
         <td><h4><b>'.$row->nom.'</b></h4></td>
           <td><h4><b>'. $row->date_creation.'</h4></b></td>
           <td><h4><b>'. $row->solde.' DH</h4></b></td> 


<td> <form action="'.url('Compte_courant/'.$row->id_compte_courant).'" method="post">
                    '. csrf_field() .'
                       
       <input type="hidden" name="_method" value="DELETE">
                     <a href="'.url('Comptes').'"  class="btn btn-info">Detail</a>

                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form> </tr>  '; 
       }
              $output .= '</tbody></table>';

$test=1;

}




    if($total_row > 0)
      {    $output.='<table class="table"> <thead  class="thead-light">
      <tr>    <th ></th>
                <th>Prenom</th>
                <th>Date Ouverture</th>
                <th>Solde</th>

                 <th>Action</th>


      </tr>
    </thead> 

   
        <tbody >';
        $i=0;

      foreach($data as $row)
       {
         $output .= '  <tr>';
 if($i==0){          $output .= '  <td rowspan="'.$total_row.'"><h4><b>Compte Epargne</b></h4></td>';
  }  $i++;

        $output .= '

         <td><h4><b> '.$i.'  '.$row->monprenom.'</h4></b></td>
           <td><h4><b>'. $row->created_at.'</h4></b></td>
           <td><h4><b>'. $row->solde.' DH</h4></b></td> 


<td> <form action="'.url('Compte_epargnes/'.$row->id_compte_epargnes).'" method="post">
                 '. csrf_field() .'
       <input type="hidden" name="_method" value="DELETE">
                     <a href="'.url('Comptes').'"  class="btn btn-info">Detail</a>

                     <button type="submit"  class="btn btn-danger">Supprimer</button>
                     </form> </tr>  ';
       }
             $output.='</tbody></table>
             
                   
                   
';
}
      
      if($test==0)
      {
       $output = '
       
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


    function Releve_Compte_Courant(Request $request)
    {
     if($request->ajax())
     {
      $output = ' 

       <head>
      <tr>      <th data-sort="string">Opération</th>
                <th data-sort="string">Type Opération </th>
                <th data-sort="string">Date Opération</th>
                <th data-sort="string">Montant</th>
                <th data-sort="string">Solde</th>
                <th data-sort="string">Num Compte  Bénèficiaire</th>


      </tr>
    </head> 

   
        <tbody >

        
        ';
      $date_fin = $request->get('date_fin');
      $date_debut = $request->get('date_debut');
      $num_comptes = $request->get('num_comptes');
       if($date_fin != '' )
      {

        $date_debut=$date_debut." 00:00:00";
      $date_fin=$date_fin." 23:59:59";
       $data = DB::table('compte_courants')
         ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
        ->join('viresements','viresements.compte_courant_id_compte_courant','=','compte_courants.id_compte_courant')
      
->join('tracesoldes', function($join) {
    $join->on('tracesoldes.idOperation', '=', 'viresements.id_versement');
    $join->on('tracesoldes.date_operation', '=', 'viresements.date_versement');
  })


   ->select('date_versement','montant','tracesoldes.solde as solde_client')


        ->whereNull('compte_courants.deleted_at')
      ->whereBetween('date_versement', [$date_debut, $date_fin])
      ->where('num_comptes','=',$num_comptes)
        ->orderBy('date_versement', 'asc')
      ->get();


       $data2 = DB::table('compte_courants')
        ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
        ->join('retraits','retraits.compte_courant_id_compte_courant','=','compte_courants.id_compte_courant')


      
->join('tracesoldes', function($join) {
    $join->on('tracesoldes.idOperation', '=', 'retraits.id_retrait');
    $join->on('tracesoldes.date_operation', '=', 'retraits.date_retrait');
  })


   ->select('date_retrait','montant','tracesoldes.solde as solde_client')


        ->whereNull('compte_courants.deleted_at')
      ->whereBetween('date_retrait', [$date_debut, $date_fin])
      ->where('num_comptes','=',$num_comptes)
        ->orderBy('date_retrait', 'asc')
        ->get();

         $data3 = DB::table('compte_courants as cc')
        ->join('comptes as c1','c1.id_comptes','=','cc.compte_id_comptes')
        ->join('virements','virements.compte_courant_id_compte_courant','=','cc.id_compte_courant')
        ->join('compte_courants as cc2','virements.compte_courant_id_compte_beneficiaire','=','cc2.id_compte_courant')
       ->join('comptes as c2','c2.id_comptes','=','cc2.compte_id_comptes')
        ->join('clients as cl','cl.id_client','=','c2.client_id_client')

->join('tracesoldes', function($join1) {
    $join1->on('tracesoldes.idOperation', '=', 'virements.id_virement');
    $join1->on('tracesoldes.date_operation', '=', 'virements.date_virement');
     })
        ->select('type_virement','date_virement','montant','tracesoldes.solde as solde_client','c2.num_comptes as compte_benificiaire','c1.num_comptes as compte_client','virements.idEpargneBenificiare as benificiaire','cl.nom  as nomBenificiaire')
        ->whereNull('cc.deleted_at')
      ->whereBetween('date_virement', [$date_debut, $date_fin])
      ->where('c1.num_comptes','=',$num_comptes)
        ->orderBy('date_virement', 'asc')
        ->get();



     
         
         
      }
      else
      {
       $data ='';
       $data2 ='';
       $data3 ='';
      }
      $total_row = $data->count();
      $total_row2 = $data2->count();
      $total_row3 = $data3->count();
            if($total_row > 0  or $total_row2 > 0  or $total_row3>0 )
      {

      foreach($data3 as $row3)
       {


      /*  $output .= '
        <tr>
         <td>virement</td>
        <td>'.$row3->type_virement.'</td>
           <td>'. $row3->date_virement.'</td>
           <td>'. $row3->montant.'</td> 
           <td>'. $row3->solde_client.'</td> ';*/

        if($row3->compte_benificiaire!=$row3->compte_client){
          $output .= '
        <tr>
         <td><h4><b>virement <br> CC -> CC</b><h4></td>
        <td><h4><b>'.$row3->type_virement.'</h4></b></td>
           <td><h4><b>'. $row3->date_virement.'</h4></b></td>
           <td><h4><b>'. $row3->montant.' DH</h4></b></td> 
           <td><h4><b>'. $row3->solde_client.' DH</h4></b></td> ';
            $output .=  ' <td><h4><b>'.$row3->nomBenificiaire.' <br> '.$row3->compte_benificiaire.'</h4></b></td> 

</tr>  ';} else  { $output .= '
        <tr>
         <td><h4><b>virement <br> CC -> CE</h4></b></td>
        <td><h4><b>'.$row3->type_virement.'</h4></b></td>
           <td><h4><b>'. $row3->date_virement.'</h4></b></td>
           <td><h4><b>'. $row3->montant.' DH</h4></b></td> 
           <td><h4><b>'. $row3->solde_client.' DH</h4></b></td> ';

$compte_benificiaire=Compte_epargne::where('id_compte_epargnes','=',$row3->benificiaire)->first();

       $output .=  ' <td>    <h4><b>'.$compte_benificiaire->prenom.'  <br>'.$row3->compte_client.' </h4></b></td> 

</tr>  ';

}


       }

        

       foreach($data as $row)
       {



        $output .= '
        <tr>
         <td> <h4><b>versement</h4></b></td>
        <td><h4><b>crédit</h4></b></td>
         <td><h4><b>'.$row->date_versement.'</h4></b></td>
           <td><h4><b>'. $row->montant.' DH</h4></b></td>
           <td><h4><b>'. $row->solde_client.' DH</h4></b></td> 
                      <td>  </td> 


</tr>  ';
       }
        foreach($data2 as $row2)
       {
        $output .= '
        <tr>
         <td><h4><b>retrait</h4></b></td>

         <td><h4><b>Débit</h4></b></td>
           <td><h4><b>'. $row2->date_retrait.'</h4></b></td>
           <td><h4><b>'. $row2->montant.' DH</h4></b></td> 
                      <td> <h4><b>'. $row2->solde_client.' DH</h4></b></td> 
                                            <td>  </td> 


</tr>  ';
       }

       
              $output .= '</tbody>';

      }
      else
      {
       $output = '
      
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



     function Releve_Compte_Epargne(Request $request)
    {
     if($request->ajax())
     {
      $output = ' 

       <head>
      <tr>       <th>Opération</th>
                <th>Type Opération </th>
                <th>Date Opération</th>
                <th>Montant</th>
                <th>Solde</th>
                <th>Num Compte  Bénèficiaire</th>


      </tr>
    </head> 

   
        <tbody >

        
        ';
      $date_fin = $request->get('date_fin');
      $date_debut = $request->get('date_debut');
      $num_comptes = $request->get('num_comptes');
      $num_compte_epargne = $request->get('num_compte_epargne');

       if($date_fin != '' )
      {

        $date_debut=$date_debut." 00:00:00";
      $date_fin=$date_fin." 23:59:59";
       $data = DB::table('compte_epargnes')
         ->join('comptes','comptes.id_comptes','=','compte_epargnes.compte_id_comptes')
        ->join('e_versements','e_versements.compte_epargne_id_compte_epargne','=','compte_epargnes.id_compte_epargnes')

        ->join('tracesoldes', function($join) {
    $join->on('tracesoldes.idOperation', '=', 'e_versements.id_versement');
    $join->on('tracesoldes.date_operation', '=', 'e_versements.date_versement');
  })


   ->select('date_versement','montant','tracesoldes.solde as solde_client')
   
        ->whereNull('compte_epargnes.deleted_at')
      ->whereBetween('date_versement', [$date_debut, $date_fin])
      ->where('num_comptes','=',$num_comptes)
      ->where('prenom','=',$num_compte_epargne)
        ->orderBy('date_versement', 'asc')
      ->get();


       $data2 = DB::table('compte_epargnes')
        ->join('comptes','comptes.id_comptes','=','compte_epargnes.compte_id_comptes')
        ->join('e_retraits','e_retraits.compte_epargne_id_compte_epargne','=','compte_epargnes.id_compte_epargnes')

        ->join('tracesoldes', function($join1) {
    $join1->on('tracesoldes.idOperation', '=', 'e_retraits.id_retrait');
    $join1->on('tracesoldes.date_operation', '=', 'e_retraits.date_retrait');
  })


   ->select('date_retrait','montant','tracesoldes.solde as solde_client')
        ->whereNull('compte_epargnes.deleted_at')
      ->whereBetween('date_retrait', [$date_debut, $date_fin])
      ->where('num_comptes','=',$num_comptes)
      ->where('prenom','=',$num_compte_epargne)

        ->orderBy('date_retrait', 'asc')
        ->get();

        $data3 = DB::table('compte_epargnes as cc')
        ->join('comptes as c1','c1.id_comptes','=','cc.compte_id_comptes')
        ->join('e_virements','e_virements.compte_epargne_id_compte_epargneBenificiaire','=','cc.id_compte_epargnes')
        ->join('compte_epargnes as cc2','e_virements.compte_epargne_id_compte_epargneClient','=','cc2.id_compte_epargnes')
       ->join('comptes as c2','c2.id_comptes','=','cc2.compte_id_comptes')
        ->join('clients as cl','cl.id_client','=','c2.client_id_client')



->join('tracesoldes', function($join2) {
    $join2->on('tracesoldes.idOperation', '=', 'e_virements.id_virement');
    $join2->on('tracesoldes.date_operation', '=', 'e_virements.date_virement');
     })
       
        ->select('type','date_virement','montant','tracesoldes.solde as solde_client','c2.num_comptes as compte_benificiaire','c1.num_comptes as compte_client','e_virements.idCourantBenificiare as benificiaire','cl.nom  as nomBenificiaire','cc2.prenom as nomBeniEpargne','cc2.solde as soldeBenificiaire')

        ->whereNull('cc.deleted_at')
      ->whereBetween('date_virement', [$date_debut, $date_fin])
      ->where('c1.num_comptes','=',$num_comptes)
        ->where('cc.prenom','=',$num_compte_epargne)

        ->orderBy('date_virement', 'asc')
        ->get();



      
         
         
      }
      else
      {
       $data ='';
       $data2 ='';
       $data3 ='';
      }
      $total_row = $data->count();
      $total_row2 = $data2->count();
     $total_row3 = $data3->count();
            if($total_row > 0 or $total_row2 > 0  or $total_row3>0 )
      {

    foreach($data3 as $row3)
       {


     
if($row3->benificiaire!=0)

      {
 $output .= '
        <tr>
         <td><h4><b>virement <br> CE -> CC</h4></b></td>
        <td><h4><b>'.$row3->type.'</h4></b></td>
           <td><h4><b>'. $row3->date_virement.'</h4></b></td>
           <td><h4><b>'. $row3->montant.' DH</h4></b></td> 
           <td><h4><b>'. $row3->solde_client.' DH</h4></b></td> ';
        $output .=  ' <td>  <h4><b> compte courant : '.$row3->nomBenificiaire.' </h4></b></td> ';}

    else {
   $output .= '
        <tr>
         <td><h4><b>virement <br> CE -> CE </h4></b></td>
        <td><h4><b>'.$row3->type.' </h4></b></td>
           <td> <h4><b>'. $row3->date_virement.' </h4></b></td>
           <td> <h4><b>'. $row3->montant.' DH </h4></b></td> 
           <td> <h4><b>'. $row3->solde_client.' DH </h4></b></td> ';
            $output .=  ' <td>   <h4><b>compte  epargne  : '.$row3->nomBeniEpargne.' <br> solde : '.$row3->soldeBenificiaire.' 
            </h4></b></td> ';

    }

$output .='</tr>  ';



       }

        

       foreach($data as $row)
       {



        $output .= '
        <tr>
         <td><h4><b>versement</h4></b></td>
        <td><h4><b>crédit</h4></b></td>
         <td><h4><b>'.$row->date_versement.'</h4></b></td>
           <td><h4><b>'. $row->montant.' DH</h4></b></td>
           <td><h4><b>'. $row->solde_client.' DH </h4></b></td> 
                      <td>  </td> 


</tr>  ';
       }
        foreach($data2 as $row2)
       {
        $output .= '
        <tr>
         <td><h4><b>retrait</h4></b></td>

         <td><h4><b>Débit</h4></b></td>
           <td><h4><b>'. $row2->date_retrait.'</h4></b></td>
           <td><h4><b>'. $row2->montant.' DH</h4></b></td> 
                      <td> <h4><b>'. $row2->solde_client.' DH<h4><b></td> 
                                            <td>  </td> 


</tr>  ';
       }

       
              $output .= '</tbody>';

      }
      else
      {
       $output = '
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

}

    
