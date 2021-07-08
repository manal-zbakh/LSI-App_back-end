<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seance;
use App\Models\Prof;
class Module extends Model
{
    use HasFactory;
    public function semestre(){
        return $this->BelongsTo(Semestre::class,'semestre_id');
    }
    public function prof(){
        return $this->BelongsTo(Prof::class,'prof_id');
    }
}
