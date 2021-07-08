<?php

namespace App\Models;
use App\Models\Module;
use App\Models\Pfe;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Prof extends Authenticatable  implements JWTSubject
{
    use HasFactory,Notifiable;
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getCours(){
        return $this->HasMany(Module::class);
    }

}
