<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compte_courant;
use App\Viresement;
use App\Retrait;
use App\Virement;
use App\E_virement;
use App\Compte_epargne;
use App\Tracesolde;

use App\Tiere;

class CompteCourantController extends Controller
{
    



public function index(){


    }
    //affiche le formulaire de creation cvs 
     public function create(){
     
        }
    //enregister un cv
     public function store(Request $request){
    
    $comptecourant=new Compte_courant(); 
       $id=Compte_courant::where('compte_id_comptes','=',$request->input('idcompte'))->first();

if(!isset($id)  && empty($id)){

    if( !empty(trim($request->input('debit_max'))) && !empty(trim($request->input('solde'))) && !empty(trim($request->input('idcompte')))  && $request->input('solde')>=$request->input('debit_max')  ){

   $id=Compte_courant::where('compte_id_comptes','=',$request->input('idcompte'))->first();
 
    $comptecourant->debit_max=$request->input('debit_max');
    $comptecourant->solde=$request->input('solde');
    $comptecourant->date_creation=date("Y-m-d H:i:s");
    $comptecourant->compte_id_comptes=$request->input('idcompte');
    $comptecourant->save();    


    session()->flash('success','le compte a été bien enregistrer');
    return redirect('Comptes');

  }else {
        session()->flash('error','le compte n est bien enregister');
    return redirect('Create_Compte');

  }
}  else {
  session()->flash('le compte courant déja créer !!','le compte courant déja créer !!');
    return redirect('Create_Compte');


}
    }
    //permet de recupérer un cv puis de le mettre dans un   formulaire 
     public function edit($id_client){
    
    }
    //permet de modifier un cv 
     public function update(ClientRequest $request,$id_client){
   
   
    }
    //  permet de supprimer un cv 
     public function destroy(Request $request,$id_compte_courant){

      Compte_courant::where('id_compte_courant','=',$id_compte_courant)->delete(); 

     //$client->delete();
    session()->flash('success','le compte courant a ete bien suprimer ');

     return redirect('Comptes');

 }


   public function  viresement(Request $request){
    $v=new Viresement();

    $v->montant=$request->input('montant');
    if(isset($v->montant)  && !empty($request->input('idcomptecourant33')) ){
    $v->date_versement=date("Y-m-d H:i:s");
    $v->compte_courant_id_compte_courant=$request->input('idcomptecourant33');
    $v->tiere_id_tiere=1;
    $v->save();    
       $Compte_courant=Compte_courant::where('id_compte_courant','=',$request->input('idcomptecourant33'))->first();
       $Compte_courant->solde=$Compte_courant->solde+$request->input('montant');
    $Compte_courant->save();



$tracesolde=new Tracesolde();
var_dump($Compte_courant->solde);
$tracesolde->idOperation=$v->id_viresement;
$tracesolde->solde=$Compte_courant->solde;
$tracesolde->date_operation=$v->date_versement;
$tracesolde->type_operation='credit';
$tracesolde->opeartion='viresement';
$tracesolde->save();
      session()->flash('success','le viresement a ete bien faite');


       
}
else {
       
 if(!isset($v->montant)) 
       { session()->flash('error','il faut saisir le montant');}
        elseif (empty($request->input('idcomptecourant33'))) {
session()->flash('error','il faut choisir le compte courant');
        }

}
    return redirect('Effectuer_Viresement');
   }


   public function  retrait(Request $request){
    $v=new Retrait();
        $v->montant=$request->input('montant');

   if(isset($v->montant) && !empty($request->input('idcomptecourant33')) ){
     $Compte_courant=Compte_courant::where('id_compte_courant','=',$request->input('idcomptecourant33'))->first();
       if(($Compte_courant->solde)-($request->input('montant'))<-10) {
      session()->flash('error','le retrait n est pas ete effectuer le montat supérieure a debit max');
          return redirect('Effectuer_Retrait');
       }else 
      {
          $v->date_retrait=date("Y-m-d H:i:s");
    $v->compte_courant_id_compte_courant=$request->input('idcomptecourant33');
    $v->tiere_id_tiere=1;
    $v->save();
        $Compte_courant->solde=($Compte_courant->solde)-($request->input('montant'));
         $Compte_courant->save();


$tracesolde=new Tracesolde();
$tracesolde->idOperation=$v->id_retrait;
$tracesolde->solde=$Compte_courant->solde;
$tracesolde->date_operation=$v->date_retrait;
$tracesolde->type_operation='debit';
$tracesolde->opeartion='retrait';
$tracesolde->save();


      session()->flash('success','le retrait a ete bien faite');
          return redirect('Effectuer_Retrait');
    }
   }else {

     session()->flash('error','le retrait n est pas bien effectuer ');
  return redirect('Effectuer_Retrait');
   }
 }

public function Virement(Request $request){

$type_virement=$request->input('type_virement');
if($type_virement=="courant_courant"){

$v1=new Virement();
$v2=new Virement();
$id_client_client=$request->input('client_id_client');
$id_compte_client=$request->input('id_comptes');
$id_client_benificiaire=$request->input('client_id_client1');
$id_compte_benificiaire=$request->input('id_comptes1');

$max=Virement::max('id_operation');


$max++;

$montant=$request->input('montant');
if(isset($montant) && $montant>0 ){
$v1->id_operation=$max;
$v1->montant=$montant;
$v1->type_virement="debit";
$v1->idEpargneBenificiare=0;
$v1->date_virement=date("Y-m-d H:i:s");
$v1->compte_courant_id_compte_courant=$id_compte_client;
$v1->compte_courant_id_compte_beneficiaire=$id_compte_benificiaire;


$v1->save();



$idOperation=$v1->id_operation;
$v2->id_operation=$idOperation;
$v2->montant=$montant;
$v2->type_virement="credit";
$v2->date_virement=date("Y-m-d H:i:s");
$v2->compte_courant_id_compte_courant=$id_compte_benificiaire;
$v2->compte_courant_id_compte_beneficiaire=$id_compte_client;   
$v2->idEpargneBenificiare=0;

$compte_client=Compte_courant::where('id_compte_courant','=',$id_compte_client)->first();

$compte_benificiaire=Compte_courant::where('id_compte_courant','=',$id_compte_benificiaire)->first();

$compte_client->solde=$compte_client->solde-$montant;

$compte_benificiaire->solde=$compte_benificiaire->solde+$montant;

$compte_client->save();
$compte_benificiaire->save();

$v2->save();
$v1->save();

$tracesolde1=new Tracesolde();
$tracesolde1->idOperation=$v1->id_virement;
$tracesolde1->solde=$compte_client->solde;
$tracesolde1->date_operation=$v1->date_virement;
$tracesolde1->type_operation='debit';
$tracesolde1->opeartion='virement';
$tracesolde1->save();




$tracesolde2=new Tracesolde();
$tracesolde2->idOperation=$v2->id_virement;
$tracesolde2->solde=$compte_benificiaire->solde;
$tracesolde2->date_operation=$v2->date_virement;
$tracesolde2->type_operation='credit';
$tracesolde2->opeartion='virement';
$tracesolde2->save();



        session()->flash('success','Virement courant -> courant   avce succés ');
} else {
          session()->flash("error","Virement courant -> courant  n'es pas bien effectuer  ");

}
     } 


if($type_virement=="courant_epargne"){

$v1=new Virement();
$v2=new E_virement();


$id_client_client=$request->input('client_id_client');
$id_compte_client=$request->input('id_comptes');
$id_client_benificiaire=$request->input('client_id_client1');
$id_compte_benificiaire=$request->input('id_comptes1');
$montant=$request->input('montant');
if(isset($montant) && $montant>0 ){

$max1=Virement::max('id_operation');
$max2=E_virement::max('id_operation');
$max=$max2;
if($max1>$max2)  $max=$max1;

$max++;
$v1->id_operation=$max;
$v1->montant=$montant;
$v1->type_virement="debit";
$v1->date_virement=date("Y-m-d H:i:s");
$v1->compte_courant_id_compte_courant=$id_compte_client;
$v1->compte_courant_id_compte_beneficiaire=$id_compte_client;
$v1->idEpargneBenificiare= $id_compte_benificiaire;
$v1->save();


$idOperation=$v1->id_operation;
$v1->id_operation=$idOperation;
$v2->id_operation=$idOperation;
$v2->montant=$montant;
$v2->type="credit";
$v2->date_virement=date("Y-m-d H:i:s");
$v2->compte_epargne_id_compte_epargneClient=$id_compte_benificiaire;
$v2->compte_epargne_id_compte_epargneBenificiaire=$id_compte_benificiaire;   
$v2->idCourantBenificiare=$id_compte_client;

$compte_client=Compte_courant::where('id_compte_courant','=',$id_compte_client)->first();
$compte_benificiaire=Compte_epargne::where('id_compte_epargnes','=',$id_compte_benificiaire)->first();

$compte_client->solde=$compte_client->solde-$montant;

$compte_benificiaire->solde=$compte_benificiaire->solde+$montant;

$compte_client->save();
$compte_benificiaire->save();

$v2->save();
$v1->save();



$tracesolde1=new Tracesolde();
$tracesolde1->idOperation=$v1->id_virement;
$tracesolde1->solde=$compte_client->solde;
$tracesolde1->date_operation=$v1->date_virement;
$tracesolde1->type_operation='debit';
$tracesolde1->opeartion='virement';
$tracesolde1->save();




$tracesolde2=new Tracesolde();
$tracesolde2->idOperation=$v2->id_virement;
$tracesolde2->solde=$compte_benificiaire->solde;
$tracesolde2->date_operation=$v2->date_virement;
$tracesolde2->type_operation='credit';
$tracesolde2->opeartion='e_virement';
$tracesolde2->save();




        session()->flash('success','Virement courant -> epargne  avce succés ');
} else {
          session()->flash("error","Virement courant -> epargne  n'es pas bien effectuer  ");

}
     } 





       return redirect('Effectuer_Virement');
        

    }








}
