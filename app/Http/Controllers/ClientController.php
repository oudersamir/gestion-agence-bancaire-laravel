<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Compte;
use App\Http\Requests\ClientRequest;
class ClientController extends Controller
{
    
public function __construct(){
    $this->middleware('auth');
}



public function index(){

	$client= Client::all();
   return view('Clients',['listclient'=>$client]);


    }
    //affiche le formulaire de creation cvs 
     public function create(){
     	return view('Clients.Create_Client');
    	}
    //enregister un cv
     public function store(ClientRequest $request){
     $client=new Client();

    $client->nom=$request->input('nom');
    $client->prenom=$request->input('prenom');
    $client->email=$request->input('email');
    $client->tel=$request->input('telephone');
    $client->adresse=$request->input('adresse');
    $client->cin=$request->input('cin');

    $client->save();
  $compte=new Compte();
  $compte->client_id_client=$client->id_client;
  $compte->num_comptes=date("dmyGis");
  $compte->date_ouverture=date("Y-m-d H:i:s");

$compte->save();


    session()->flash('success','le client a ete bien enregistrer  ');
    return redirect('Clients');

    }
    //permet de recupérer un cv puis de le mettre dans un 	formulaire 
     public function edit($id_client){
     $client=client::where('id_client',$id_client)->first();
     return view('Clients/Edit_Client',['client'=>$client]);
    }
    //permet de modifier un cv 
     public function update(ClientRequest $request,$id_client){
    $client=client::where('id_client','=',$id_client)->first();
    $client->nom=$request->input('nom');
    $client->prenom=$request->input('prenom');
    $client->email=$request->input('email');
    $client->tel=$request->input('telephone');
    $client->adresse=$request->input('adresse');
    $client->cin=$request->input('cin');

    $client->save();
    session()->flash('success','le client a ete bien modifier');
    return redirect('Clients');
   
    }
    // 	permet de supprimer un cv 
     public function destroy(Request $request,$id_client){
      $client=Client::where('id_client','=',$id_client)->delete(); 
      $compte=Compte::where('client_id_client','=',$id_client)->delete(); 

     //$client->delete();
    session()->flash('success','le client a été bien supprimer');

     return redirect('Clients');

     /*;}
     redirect('Accueil');*/
    /* $client=client::where('id_client',$id_client)->first();
     return view('Clients/Edit_Client',['client'=>$client]);*/
 

 }


}
