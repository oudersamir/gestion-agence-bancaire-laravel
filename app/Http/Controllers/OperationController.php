<?php

namespace App\Http\Controllers;
use App\Virement;
use App\CompteCourant;
use Illuminate\Http\Request;
use DB;
class OperationController extends Controller
{
    

public function index(){
   return view('Operations');
    }

public function index_viresement(){
 return view('Operations.Viresement');
    }

public function index_retrait_viresement(){
 return view('Operations..epargne.Viresement');
    }
    public function index_retrait(){
   return view('Operations.Retrait');
    }

public function index_retrait_epargne(){
   return view('Operations.epargne.Retrait');
    }



public function index_virement(){
 $client_list = DB::table('clients')
          ->join('comptes','comptes.client_id_client','=','clients.id_client')

          ->orderBy('id_client', 'desc')
         ->get();
   return view('Operations.Virement')->with('client_list', $client_list);   
      }


      public function index_virement_epargne(){
 $client_list = DB::table('clients')
          ->join('comptes','comptes.client_id_client','=','clients.id_client')

          ->orderBy('id_client', 'desc')
         ->get();
   return view('Operations.epargne.Virement')->with('client_list', $client_list);   
      }

    function fetch(Request $request)
    {

     $value = $request->get('value');
     $client=  $request->get('client');
     $value2 = $request->get('value2');
     $meme = $request->get('meme');

     if($client=='c'){
      $value2='0';
     }
          $num_compte='';

     $dependent = $request->get('dependent');
  $data = DB::table('compte_courants')
         ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
     ->where([ ['client_id_client','=', $value], ['id_compte_courant','<>',$value2]])
             ->whereNull('compte_courants.deleted_at')

     ->get();
     $output = '';
     foreach($data as $row)
     {
         $num_compte=$row->num_comptes;

     $output .= '<option value="'.$row->id_compte_courant.'"><b>  Numero de compte  :  '.$row->num_comptes.'  ----  compte courant --- solde --> '.$row->solde.' DH </b></option>';

     }


  if($client=='b' && $meme=='true'){

  $data2 = DB::table('compte_epargnes')
         ->join('comptes','comptes.id_comptes','=','compte_epargnes.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
    ->select('id_compte_epargnes','num_comptes','solde','compte_epargnes.prenom as pprenom')

     ->where([ ['client_id_client','=', $value]])
             ->whereNull('compte_epargnes.deleted_at')

     ->get();
     


  

     foreach($data2 as $row2)
     {

   //  $output .= '<option value="'.$row2->id_compte_epargnes.'">'.$row2->num_comptes.' compte epargne '.$row2->solde.'</option>';

  $output .= '<option value="'.$row2->id_compte_epargnes.'">  Numero de compte  :  '.$row2->num_comptes.'  ----  compte epargne de '.$row2->pprenom.'  ---   solde  --> '.$row2->solde.'  DH</option>';
     }
  }
     echo $output;
    }
     function fetch_epargne(Request $request)
    {

     $value = $request->get('value');
     $client=  $request->get('client');
     $value2 = $request->get('value2');
     if($client=='c'){
      $value2='0';
     }
     $dependent = $request->get('dependent');
  

  $output='';

  $data2 = DB::table('compte_epargnes')
         ->join('comptes','comptes.id_comptes','=','compte_epargnes.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
                       ->select('id_compte_epargnes','num_comptes','solde','compte_epargnes.prenom as pprenom')

     ->where([ ['client_id_client','=', $value], ['id_compte_epargnes','<>',$value2]])
        ->whereNull('compte_epargnes.deleted_at')

     ->get();
     $num_compte='';
          foreach($data2 as $row2)
     {
       $num_compte=$row2->num_comptes;
     $output .= '<option value="'.$row2->id_compte_epargnes.'">  Numero de compte  :  '.$row2->num_comptes.'  ----  compte epargne de '.$row2->pprenom.'  ---   solde  --> '.$row2->solde.'  DH</option>';

     }

if($value2!='0'){
  $data = DB::table('compte_courants')
         ->join('comptes','comptes.id_comptes','=','compte_courants.compte_id_comptes')
          ->join('clients','clients.id_client','=','comptes.client_id_client')
     ->where([ ['client_id_client','=', $value],['num_comptes','=', $num_compte]])
             ->whereNull('compte_courants.deleted_at')

     ->get();
     foreach($data as $row)
     {

  $output .= '<option value="'.$row->id_compte_courant.'">  Numero de compte  :  '.$row->num_comptes.'  ----  compte courant --- solde --> '.$row->solde.' DH</option>';
     }

   }

  
     echo $output;
    }




    //affiche le formulaire de creation cvs 
     public function create(){
    	}
    //enregister un cv
     public function store(CvRequest $request){
   
    }
    //permet de recupérer un cv puis de le mettre dans un 	formulaire 
     public function edit($id){
    
    }
    //permet de modifier un cv 
     public function update(CvRequest $request,$id){
   
    }
    // 	permet de supprimer un cv 
     public function destroy(Request $request,$id){
    

 }}

