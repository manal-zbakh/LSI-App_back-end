<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projet;
class ProjetController extends Controller
{
    public function   getpfe($id){
        if($id==0)
        $donnee=Projet::all();
        else
        $donnee=Projet::where('prof_id','=',$id)->get();
        $Pfe=array();
        for($i=0;$i<count($donnee);$i++)
        array_push($Pfe,
       [
         'id'  => $donnee[$i]->id ,
         'eid' => $donnee[$i]->etudiant->id,
         'nom' => $donnee[$i]->etudiant->nom,
         'prenom' => $donnee[$i]->etudiant->prenom,
         'pid'    => $donnee[$i]->getprof->id,
         'nomp'   => $donnee[$i]->getprof->prenom,
         'prenomp' => $donnee[$i]->getprof->nom,
         'sujet' => $donnee[$i]->sujet,
         'date'  => $donnee[$i]->date
         ]

        ) ;

      return $Pfe;
    }
    public function getnotpfe(){
        return DB::select('select * from etudiants where semestre_id=6 and
         id not in (select etudiant_id from projets)');
    }
    public function getpfeetu($id){
      $et=Projet::where('etudiant_id','=',$id)->get()->first();
      return  
        [
          'id'  => $et->id,
          'nom' => $et->getprof->nom,
          'prenom' => $et->getprof->prenom,
          'sujet' => $et->sujet,
          'date'  => $et->date
          
      ];
    
    }
    public function addpfe(Request $r){
    $pfe = new Projet();
    $pfe->etudiant_id=$r->eid;
    $pfe->prof_id=$r->pid;
    $pfe->sujet=$r->sujet;
    $pfe->date=$r->date;
    $pfe->save();
    }
    public function update(Request $r){
      $pfe = Projet::find($r->id);
      $pfe->etudiant_id=$r->eid;
      $pfe->prof_id=$r->pid;
      $pfe->sujet=$r->sujet;
      $pfe->date=$r->date;
      $pfe->save();
      }
    public function delpfe($id){
    Projet::find($id)->delete();
    }
}
