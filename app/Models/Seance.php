<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;
class Seance extends Model
{
    use HasFactory;
    public function getModule(){
        return $this->BelongsTo(Module::class,'module_id');
    }
}
