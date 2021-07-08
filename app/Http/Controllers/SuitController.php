<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Suit;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class SuitController extends Controller
{
public function getNotes($id){
/* return  Suit::where([['etudiant_id','=',]],['module_id','=','2']])->first()->etudiant; */
  $donnee=Suit::where('module_id','=',$id)->get();
  $Note=array();
  for($i=0;$i<count($donnee);$i++)
  array_push($Note,
 [
   'id' =>       $donnee[$i]->id ,
   'note' =>     $donnee[$i]->note,
   'nom' =>  $donnee[$i]->etudiant->nom,
   'prenom' => $donnee[$i]->etudiant->prenom,
   'etudiant_id' => $donnee[$i]->etudiant->id
   ]

  ) ;

return $Note;
}
public function getNotesetu($id){
    /* return  Suit::where([['etudiant_id','=',]],['module_id','=','2']])->first()->etudiant; */
      $donnee=Suit::where('etudiant_id','=',$id)->get();
      $Note=array();
      for($i=0;$i<count($donnee);$i++)
      array_push($Note,
     [
       'id' =>       $donnee[$i]->id ,
       'note' =>     $donnee[$i]->note,
       'nom' =>  $donnee[$i]->etudiant->nom,
       'prenom' => $donnee[$i]->etudiant->prenom,
       'module' => $donnee[$i]->getcours->intitule,
       'etudiant_id' => $donnee[$i]->etudiant->id
       ]

      ) ;

    return $Note;
    }
public function setNote(Request $req){

$et=Suit::find($req->id);
$et->note=$req->note;
$et->save();


}

}
