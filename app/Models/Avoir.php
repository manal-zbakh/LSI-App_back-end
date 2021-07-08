<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Seance;
use App\Models\Salle;
class Avoir extends Model
{
    use HasFactory;
    public function getSeance(){
        return $this->BelongsTo(Seance::class,'seance_id');
    }
    public function getSalle(){
        return $this->BelongsTo(Salle::class,'salle_id');
    }

}
