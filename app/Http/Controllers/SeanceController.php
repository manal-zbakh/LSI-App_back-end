<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
   public function add(Request $req){
       $s=new Seance();
       $s->huere_debut=$req->heure;
    
       $s->module_id=$req->module;
       $s->save();
       return response()->json(array($s->id), 200);
/*        $s->create([
           'huere_debut' => $req->heure,
           'huere_fin'=> '0',
           'module_id' => $req->module
       ]); */
   }
}
