<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salle;
class SalleController extends Controller
{
    public function get(){
        return Salle::all();
    }

}
