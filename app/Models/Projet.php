<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Prof;
class Projet extends Model
{
    use HasFactory;
    public function getprof(){
        return $this->BelongsTo(Prof::class,'prof_id');
    }
    public function etudiant(){
return $this->BelongsTo(Etudiant::class);
    }
}
