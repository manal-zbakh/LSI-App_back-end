<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avoir;
use Illuminate\Support\Facades\DB;

class AvoirController extends Controller
{
   public function getSeanceEtu($id){
    $module=array();

 for($i=0;$i<6;$i++){
 $tab= DB::select('select avoirs.*,huere_debut,modules.intitule,salles.intitule as salleintitule from avoirs,seances,modules,salles where avoirs.seance_id=seances.id and seances.module_id=modules.id and avoirs.salle_id=salles.id and date='.($i+1).' and module_id in (select id from modules where semestre_id='.$id.')');
for($j=0;$j<2;$j++){
  if(count($tab)==0) {array_push($module,null); array_push($module,null); break;}
 else if(count($tab)==1 && $j==1) {array_push($module,null); break;}
else if($tab[$j]->huere_debut==1) {
  array_push($module,[
    'id' => $tab[$j]->id ,
     'intitule'  => $tab[$j]->intitule,
      'salle' => $tab[$j]->salleintitule,

   ]);
}
else if ($tab[$j]->huere_debut==2){

    if($j==0 && count($tab)==1){
        array_push($module,null);
        array_push($module,[
          'id' => $tab[$j]->id ,
           'intitule'  => $tab[$j]->intitule,
           'salle' => $tab[$j]->salleintitule,
        ]);
         break;
      }
         else{
          array_push($module,[
          'id' => $tab[$j]->id ,
           'intitule'  => $tab[$j]->intitule,
           'salle' => $tab[$j]->salleintitule,
           ]);
     }
}
else array_push($module,null);
}
}
 return $module ;
}

public function getSeanceprof($id){
    $module=array();

 for($i=0;$i<6;$i++){
  /* $tab= Avoir::orderBy('date','asc')->where([['date','=',$i+1],['','=','']])->get(); */
 $tab= DB::select('select avoirs.*,huere_debut,modules.intitule,salles.intitule as salleintitule from avoirs,seances,modules,salles where avoirs.seance_id=seances.id and seances.module_id=modules.id and avoirs.salle_id=salles.id and date='.($i+1).' and module_id in (select id from modules where prof_id='.$id.')');

for($j=0;$j<2;$j++){
  if(count($tab)==0) {array_push($module,null); array_push($module,null); break;}
 else if(count($tab)==1 && $j==1) {array_push($module,null); break;}
else if($tab[$j]->huere_debut==1) {
  array_push($module,[
    'id' => $tab[$j]->id ,
     'intitule'  => $tab[$j]->intitule,
      'salle' => $tab[$j]->salleintitule,

   ]);
}
else if ($tab[$j]->huere_debut==2){

    if($j==0 && count($tab)==1){
        array_push($module,null);
        array_push($module,[
          'id' => $tab[$j]->id ,
           'intitule'  => $tab[$j]->intitule,
           'salle' => $tab[$j]->salleintitule,
        ]);
         break;
      }
         else{
          array_push($module,[
          'id' => $tab[$j]->id ,
           'intitule'  => $tab[$j]->intitule,
           'salle' => $tab[$j]->salleintitule,
           ]);
     }
}
else array_push($module,null);
}
}
 return $module ;
}
public function checkdate($id,$s){
   /*
   $id = le jour 
   $s= semestre
   */
 $tab=DB::select('select avoirs.*,seances.huere_debut from avoirs,seances  where avoirs.seance_id=seances.id and date='.$id.' and seance_id in (select id from seances where module_id in ( select id from modules where semestre_id='.$s.')) ');
    if(count($tab)==0) return [1,2]  ;
    else if(count($tab)==1 ) return ( $tab[0]->huere_debut==1 ? 2:1);
    else  return null;
}
public function get(){
$tmp=Avoir::find(1);
return $tmp->getSeance->getModule->suit->intitule;
}
public function getlibre($j,$h){


/*
$j = le jour 
$h = l'heure
*/
return DB::select('
  select * from salles  where salles.id not in
  (select salle_id from avoirs where date='.$j.' and seance_id  in(
    select id from seances where huere_debut='.$h.'))');
}
public function add(Request $req){
    $avoir=new Avoir();
    $avoir->date=$req->date;
    $avoir->salle_id=$req->salle;
    $avoir->seance_id=$req->seance_id;
    $avoir->save();
}
}
