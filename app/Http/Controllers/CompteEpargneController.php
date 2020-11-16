<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compte_epargne;
use App\E_retrait;
use App\E_virement;
use App\Virement;
use App\Compte_courant;
use App\E_versement;
use DB;
use App\Tracesolde;
class CompteEpargneController extends Controller
{

public function index(){


    }
    //affiche le formulaire de creation cvs 
     public function create(){
        }
    //enregister un cv
     public function store(Request $request){

     $compteepargne=new Compte_epargne();
$query2=$request->input('idcompte');
$query3=$request->input('prenom');

$idcomptecourant=Compte_courant::where('compte_id_comptes','=',$request->input('idcompte'))->first();
$idcompteepargne=DB::table('compte_epargnes')

->where(function($query1) use ($query2,$query3) {
          $query1->where('compte_id_comptes','=',$query2)
         ->where('prenom','=',$query3)
         ->whereNull('deleted_at')
         ;
       })
->get();

$taille=$idcompteepargne->count();
if(isset($idcomptecourant)  && !empty($idcomptecourant)   && $taille==0 ) {





if(!empty(trim($request->input('prenom'))) && !empty(trim($request->input('solde'))) && !empty(trim($request->input('taux_interet')))
&& !empty(trim($request->input('idcompte'))) &&  $request->input('solde') >=$request->input('taux_interet')){
    $compteepargne->prenom=$request->input('prenom');
    $compteepargne->solde=$request->input('solde');
    $compteepargne->taux_interet=$request->input('taux_interet');
    $compteepargne->compte_id_comptes=$request->input('idcompte');


    $compteepargne->save();   
        session()->flash('success','le compte epargne a ete bien enregister ');
            return redirect('Comptes');

 }else {
            session()->flash('error','il faut saisir tout les champs');
    return redirect('Create_Compte');

 }
   
   }
   else {
 session()->flash('error','le compte epargne est deja creer ou le compte courant n est pas encore creer ');
           return redirect('Create_Compte');

   }

var_dump($idcompteepargne);
echo "<br><br><br>";
var_dump($idcomptecourant);


    }
    //permet de recupérer un cv puis de le mettre dans un   formulaire 
     public function edit($id_client){
    
    }
    //permet de modifier un cv 
     public function update(ClientRequest $request,$id_client){
   
   
    }
public function addCompteEpargne(Request $request)

{
	$compteepargne=new Compte_epargne(); 
	$compteepargne->solde=$request->solde;
	$compteepargne->prenom=$request->prenom;
	$compteepargne->compte_id_comptes=2;
    $compteepargne->save();
 return Response()->json(['etat'=> true,'id'=>$compteepargne->id_compte_epargnes]);
}

     public function destroy(Request $request,$id_compte_epargnes){

Compte_epargne::where('id_compte_epargnes','=',$id_compte_epargnes)->delete(); 

   
    session()->flash('success','le compte epargne a ete bien suprimer ');

     return redirect('Comptes');


 }



 public function  viresement(Request $request){
    $v=new E_versement();

    $v->montant=$request->input('montant');
    if(isset($v->montant) && !empty($request->input('idcompteepargne33'))){
    $v->date_versement=date("Y-m-d H:i:s");
    $v->compte_epargne_id_compte_epargne=$request->input('idcompteepargne33');
    $v->save();    
       $Compte_epargne=Compte_epargne::where('id_compte_epargnes','=',$request->input('idcompteepargne33'))->first();
       $Compte_epargne->solde=$Compte_epargne->solde+$request->input('montant');
    $Compte_epargne->save();


$tracesolde=new Tracesolde();
$tracesolde->idOperation=$v->id_versement;
$tracesolde->solde=$Compte_epargne->solde;
$tracesolde->date_operation=$v->date_versement;
$tracesolde->type_operation='credit';
$tracesolde->opeartion='e_versement';
$tracesolde->save();


      session()->flash('success','le viresement a ete bien faite');
}
else {
        session()->flash('error','il faut saisir le montant');

}
    return redirect('Effectuer_Viresement_Epargne');
   }

public function Virement(Request $request){
  $type_virement=$request->input('type_virement');
if($type_virement=="epargne_epargne"){
$v1=new E_virement();
$v2=new E_virement();
$id_client_client=$request->input('client_id_client');
$id_compte_client=$request->input('id_comptes');
$id_client_benificiaire=$request->input('client_id_client1');
$id_compte_benificiaire=$request->input('id_comptes1');
$montant=$request->input('montant');

if(isset($montant) && $montant>0 ){
$v1->id_operation=0;
$v1->montant=$montant;
$v1->type="credit";
$v1->date_virement=date("Y-m-d H:i:s");
$v1->compte_epargne_id_compte_epargneClient=$id_compte_client;
$v1->compte_epargne_id_compte_epargneBenificiaire=$id_compte_benificiaire;
$v1->idCourantBenificiare=0;

$v1->save();
$idOperation=$v1->id_virement;
$v1->id_operation=$idOperation;
$v2->id_operation=$idOperation;
$v2->montant=$montant;
$v2->type="debit";
$v2->date_virement=date("Y-m-d H:i:s");
$v2->compte_epargne_id_compte_epargneClient=$id_compte_benificiaire;
$v2->compte_epargne_id_compte_epargneBenificiaire=$id_compte_client;   
$v2->idCourantBenificiare=0;

$compte_client=Compte_epargne::where('id_compte_epargnes','=',$id_compte_client)->first();
$compte_client->solde=$compte_client->solde-$montant;
$compte_client->save();

$compte_benificiaire2=Compte_epargne::where('id_compte_epargnes','=',$id_compte_benificiaire)->first();



$compte_benificiaire2->solde=$compte_benificiaire2->solde+$montant;
$compte_benificiaire2->save();


$v2->save();
$v1->save();


$tracesolde1=new Tracesolde();
$tracesolde1->idOperation=$v1->id_virement;
$tracesolde1->solde=$compte_benificiaire2->solde;
$tracesolde1->date_operation=$v1->date_virement;
$tracesolde1->type_operation='credit';
$tracesolde1->opeartion='e_virement';
$tracesolde1->save();




$tracesolde2=new Tracesolde();
$tracesolde2->idOperation=$v2->id_virement;
$tracesolde2->solde=$compte_client->solde;
$tracesolde2->date_operation=$v2->date_virement;
$tracesolde2->type_operation='debit';
$tracesolde2->opeartion='e_virement';
$tracesolde2->save();


        session()->flash('success','Virement epargne -> epargne   avce succés ');
} else {
          session()->flash("error","Virement epargne -> epargne  n'es pas bien effectuer  ");

}
      }

     
if($type_virement=="epargne_courant"){

$v1=new Virement();
$v2=new E_virement();


$id_client_client=$request->input('client_id_client');
$id_compte_client=$request->input('id_comptes');
$id_client_benificiaire=$request->input('client_id_client1');
$id_compte_benificiaire=$request->input('id_comptes1');

$montant=$request->input('montant');
if(isset($montant) && $montant>0 ){
$v1->id_operation=0;
$v1->montant=$montant;
$v1->type_virement="credit";
$v1->date_virement=date("Y-m-d H:i:s");
$v1->compte_courant_id_compte_courant=$id_compte_benificiaire;
$v1->compte_courant_id_compte_beneficiaire=$id_compte_benificiaire;
$v1->idEpargneBenificiare=$id_compte_client;


$max1=Virement::max('id_operation');
$max2=E_virement::max('id_operation');
$max=$max2;
if($max1>$max2)  $max=$max1;

$max++;
$idOperation=$max;
$v1->id_operation=$idOperation;
$v2->id_operation=$idOperation;
$v2->montant=$montant;
$v2->type="debit";
$v2->date_virement=date("Y-m-d H:i:s");
$v2->compte_epargne_id_compte_epargneClient=$id_compte_client;
$v2->compte_epargne_id_compte_epargneBenificiaire=$id_compte_client;   
$v2->idCourantBenificiare=$id_compte_benificiaire;

$compte_benificiaire=Compte_courant::where('id_compte_courant','=',$id_compte_benificiaire)->first();
$compte_client=Compte_epargne::where('id_compte_epargnes','=',$id_compte_client)->first();

$compte_client->solde=$compte_client->solde-$montant;

$compte_benificiaire->solde=$compte_benificiaire->solde+$montant;

$compte_client->save();
$compte_benificiaire->save();

$v2->save();
$v1->save();


$tracesolde1=new Tracesolde();
$tracesolde1->idOperation=$v1->id_virement;
$tracesolde1->solde=$compte_benificiaire->solde;
$tracesolde1->date_operation=$v1->date_virement;
$tracesolde1->type_operation='credit';
$tracesolde1->opeartion='virement';
$tracesolde1->save();




$tracesolde2=new Tracesolde();
$tracesolde2->idOperation=$v2->id_virement;
$tracesolde2->solde=$compte_client->solde;
$tracesolde2->date_operation=$v2->date_virement;
$tracesolde2->type_operation='debit';
$tracesolde2->opeartion='e_virement';
$tracesolde2->save();

        session()->flash('success','Virement epargne-> courant  avce succés ');
} else {
          session()->flash("error","Virement eoargne -> courant  n'es pas bien effectuer  ");

}
     } 

        return redirect('Effectuer_Virement_epargne');
        

    }

        public function  retrait(Request $request){
   $v=new E_retrait();
        $v->montant=$request->input('montant');

   if(isset($v->montant) && !empty($request->input('idcompteepargne'))){
 $Compte_epargne=Compte_epargne::where('id_compte_epargnes','=',$request->input('idcompteepargne'))->first();

       if(($Compte_epargne->solde)-($request->input('montant'))<-10) {

      session()->flash('warning','le retrait n est pas ete effectuer le montat supérieure a debit max');

          return redirect('Effectuer_Retrait_Epargne');

       }else 
      {
                  $v->date_retrait=date("Y-m-d H:i:s");
    $v->compte_epargne_id_compte_epargne=$request->input('idcompteepargne');
    $v->save();
        $Compte_epargne->solde=($Compte_epargne->solde)-($request->input('montant'));
         $Compte_epargne->save();


$tracesolde=new Tracesolde();
$tracesolde->idOperation=$v->id_retrait;
$tracesolde->solde=$Compte_epargne->solde;
$tracesolde->date_operation=$v->date_retrait;
$tracesolde->type_operation='debit';
$tracesolde->opeartion='e_retrait';
$tracesolde->save();



      session()->flash('success','le retrait a ete bien faite');
          return redirect('Effectuer_Retrait_Epargne');

    }
   }else {


     session()->flash('warning','le retrait n est pas bien effectuer ');
  return redirect('Effectuer_Retrait_Epargne');
   }
}
}
