<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Etudiant;
use App\Models\Module;

use Illuminate\Http\Request;

class Suit extends Model
{
    use HasFactory;
    public function etudiant(){
      return $this->BelongsTo(Etudiant::class,'etudiant_id');
    }
    public function getcours(){
        return $this->BelongsTo(Module::class,'module_id');
    }
    public function add(Request $req){
        $note=new Suit();
        $note->note=null;
        $note->etudiant_id=$req->etudiant_id;
        $note->prof_id=$req->prof_id;
    }

}
