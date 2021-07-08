<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
class ModuleController extends Controller
{
  public function getAll(){
return Module::all();
   }
   public function modules($id){
    $tmp= Module::where('semestre_id','=',$id)->get();
    $module=array();
    for($i=0;$i<count($tmp);$i++)
    array_push( $module,
    [
        'id' => $tmp[$i]->id,
        'intitule' => $tmp[$i]->intitule,
        'coef' => $tmp[$i]->coef,
        'prof_id' =>  $tmp[$i]->prof_id,
        'prof' => $tmp[$i]->prof->nom." ".$tmp[$i]->prof->prenom,
        'semestre_id' => $tmp[$i]->semestre_id,
        'semestre' => $tmp[$i]->semestre->intitule
    ]
   );
   return $module;
   }
   public function add(Request $req){
       $module=new Module();
       $module->intitule=$req->intitule;
       $module->coef=$req->coef;
       $module->prof_id=$req->prof_id;
       $module->semestre_id=$req->semestre_id;
       $module->save();
   }
  public function update(Request $req){
    $module=Module::find($req->id);
    $module->intitule=$req->intitule;
    $module->coef=$req->coef;
    $module->prof_id=$req->prof_id;
    $module->save();
  }
  public function delete($id){
    Module::find($id)->delete();
  }
}
