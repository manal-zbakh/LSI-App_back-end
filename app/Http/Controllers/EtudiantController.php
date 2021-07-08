<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    public function getAll(){
        return Etudiant::all();
    }
    public function add(Request $req){
         $e=new Etudiant();
         $e->nom=$req->nom;
         $e->prenom=$req->prenom;
         $e->email=$req->email;
         $e->date_naissance=$req->date_naissance;
         $e->lieu_naissance=$req->lieu_naissance;
         $e->tel=$req->tel;
         $e->cne=$e->cne;
         $e->cin=$req->cin;
         $e->password=$req->password;
         $e->adresse=$req->adresse;
         $e->save();
    }
    public function update(Request $req){
        $e=Etudiant::find($req->id)->first();
        $e->nom=$req->nom;
        $e->prenom=$req->prenom;
        $e->email=$req->email;
        $e->date_naissance=$req->date_naissance;
        $e->lieu_naissance=$req->lieu_naissance;
        $e->tel=$req->tel;
        $e->cne=$e->cne;
        $e->cin=$req->cin;
        $e->password=$req->password;
        $e->adresse=$req->adresse;
        $e->save();
   }
   public function delete($id){
       Etudiant::find($id)->delete();
   }
   public function getEtbysemestre($id){
   return Etudiant::where('semestre_id','=',$id)->get();
 // return  DB::select('select * from etudiants where semestre_id='.$id);
}
    public function getModule($id){
return Etudiant::find($id)->mesmodules;
    }
}
