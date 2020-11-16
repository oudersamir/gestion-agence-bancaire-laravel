<?php

namespace App\Http\Controllers;
use App\Compte;
use Illuminate\Http\Request;
use DB;

class CompteController extends Controller
{   
public function __construct(){
    $this->middleware('auth');
}

public function index(){

    $compte= Compte::all();
   return view('Comptes',['listcompte'=>$compte]);

    }
    public function suppression(){

    $compte= Compte::all();
   return view('Comptes.Supprimer_Compte',['listcompte'=>$compte]);

    }
    //affiche le formulaire de creation cvs 
     public function create(){
        return view('Comptes.Create_Compte');
        }
    //enregister un cv
     public function store(Request $request){
     $compte=new Compte();

    session()->flash('success','le Compte a ete bien enregistrer');
    return redirect('Comptes');

    }
    //permet de recupérer un cv puis de le mettre dans un   formulaire 
     public function edit($id_client){
    
    }
    //permet de modifier un cv 
     public function update(ClientRequest $request,$id_client){
   
   
    }
    //  permet de supprimer un cv 
     public function destroy(Request $request,$id_client){



 }

  function fetch(Request $request)
    {
     if($request->get('query'))
     {
          
      $query=$request->get('query');
     $data = DB::table('clients')
         ->join('comptes','comptes.client_id_client','=','clients.id_client')
       ->join('compte_courants','compte_courants.compte_id_comptes','=','comptes.id_comptes')

          ->whereNull('clients.deleted_at')
          ->where(function($query1) use ($query) {
          $query1->where('prenom', 'like', '%'.$query.'%')
         ->orWhere('nom', 'like', '%'.$query.'%')
         ->orWhere('cin', 'like', '%'.$query.'%')
         ->orWhere('num_comptes', 'like', '%'.$query.'%');
})
          ->orderBy('id_client', 'desc')

         ->get();



 

     /* $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
     foreach($data as $row)
      {
       $output .= '
       <li><a href="#">  Mr '.$row->nom.'  '.$row->prenom.'  '.$row->cin.'  :'.$row->num_comptes.'</a></li>
       <input id="idcompte11" name="idcompte" type="hidden" value="'.$row->id_comptes.'">

       ';
      }*/
   



      $output = '<div class="dropdown-menu" style="display:block; position:relative"> ';
     foreach($data as $row)
      {
       $output .= '
       <a  class="dropdown-item"href="#">  Mr '.$row->nom.'  '.$row->prenom.'  '.$row->cin.'  :'.$row->num_comptes.'</a></li>
       <input id="idcompte11" name="idcompte" type="hidden" value="'.$row->id_comptes.'">
       <input id="idcomptecourant11" name="idcomptecourant" type="hidden" value="'.$row->id_compte_courant.'">

       <input id="nom0" name="nom0" type="hidden" value="'.$row->nom.'">
       <input id="prenom0" name="prenom0" type="hidden" value="'.$row->prenom.'">
       <input id="numcomptes0" name="num_comptes0" type="hidden" value="'.$row->num_comptes.'">

       ';
      }


      $output .= '</ul>';
      echo $output;
     }

    }



    function fetch_epargne(Request $request)
    {
     if($request->get('query'))
     {
          
      $query=$request->get('query');
     $data = DB::table('clients')
         ->join('comptes','comptes.client_id_client','=','clients.id_client')
       ->join('compte_epargnes','compte_epargnes.compte_id_comptes','=','comptes.id_comptes')

          ->whereNull('clients.deleted_at')
          ->where(function($query1) use ($query) {
          $query1->where('nom', 'like', '%'.$query.'%')
         ->orWhere('cin', 'like', '%'.$query.'%')
         ->orWhere('num_comptes', 'like', '%'.$query.'%');
})
          ->orderBy('id_client', 'desc')

         ->get();
  
  $position=0;

      $output = '<div class="dropdown-menu" style="display:block; position:relative"> ';
    foreach($data as $row)
      {

       $output .= '
       <a  id="position_'.$position.'" class="dropdown-item"href="#">  Mr '.$row->nom.' '.$row->prenom.'  '.$row->cin.'  :'.$row->num_comptes.'</a></li>
       <input id="idcompte_'.$position.'" name="idcompte" type="hidden" value="'.$row->id_comptes.'">
       <input id="idcompteepargne_'.$position.'" name="idcompteepargne" type="hidden" value="'.$row->id_compte_epargnes.'">
       <input name="solde" id="solde_'.$position.'" type="hidden" value="'.$row->solde.'">

       <input name="nom" id="nom_'.$position.'" type="hidden" value="'.$row->nom.'">
       <input name="prenom" id="prenom_'.$position.'" type="hidden" value="'.$row->prenom.'">
       <input name="numcomptes" id"num_comptes_'.$position.'" type="hidden" value="'.$row->num_comptes.'">

       '; $position++;
      }

      $output .= '</ul>';
      echo $output;
     }

    }


    function fetchOfCreate(Request $request)
    {
     if($request->get('query'))
     {         
      $query=$request->get('query');
     $data = DB::table('clients')
          ->join('comptes','comptes.client_id_client','=','clients.id_client')
          ->leftJoin('compte_courants', 'comptes.id_comptes', '=', 'compte_courants.compte_id_comptes')
          ->whereNull('clients.deleted_at')
         // ->whereNull('compte_courants.id_compte_courant')
          ->where(function($query1) use ($query) {
          $query1->where('prenom', 'like', '%'.$query.'%')
         ->orWhere('nom', 'like', '%'.$query.'%')
         ->orWhere('cin', 'like', '%'.$query.'%');
})
          ->orderBy('id_client', 'desc')
         ->get();





      $output = '<div class="dropdown-menu" style="display:block; position:relative">';
     foreach($data as $row)
      {
       $output .= '
       <a  class="dropdown-item"href="#">  Mr '.$row->nom.'  '.$row->prenom.'  '.$row->cin.'  :  '.$row->num_comptes.'</a></li>
       <input id="idcompte11" name="idcompte" type="hidden" value="'.$row->id_comptes.'">
       <input id="nom0" name="nom0" type="hidden" value="'.$row->nom.'">
       <input id="prenom0" name="prenom0" type="hidden" value="'.$row->prenom.'">
       <input id="numcomptes0" name="num_comptes0" type="hidden" value="'.$row->num_comptes.'">
       ';
      }
      $output .= '</ul>';
      echo $output;
     }

    }


}
