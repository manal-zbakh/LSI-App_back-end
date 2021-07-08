<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prof;
class ProfController extends Controller
{
    public function getAll(){
        return Prof::all();
    }

    public  function getcours($id)
    {
        return Prof::find($id)->getCours;
    }
    public function add(Request $req){
        $p=new Prof();
        $p->nom=$req->nom;
        $p->prenom=$req->prenom;
        $p->email=$req->email;
        $p->date_naissance=$req->date_naissance;
        $p->tel=$req->tel;
        $p->cin=$req->cin;
        $p->password=$req->password;
        $p->adresse=$req->adresse;
        $p->save();
   }
   public function update(Request $req){
    $p=Prof::find($req->id)->first();
    $p->nom=$req->nom;
    $p->prenom=$req->prenom;
    $p->email=$req->email;
    $p->date_naissance=$req->date_naissance;
    $p->tel=$req->tel;
    $p->cin=$req->cin;
    $p->password=$req->password;
    $p->adresse=$req->adresse;
    $p->save();
}
public function delete($id){
    Prof::find($id)->delete();
}


}
