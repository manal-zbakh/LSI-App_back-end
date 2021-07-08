<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function Alogin(Request $req){
        $credentials=[
            'email' => $req->email,
            'password' => $req->password,
        ];
        $token=Auth::guard('admin-check')->attempt($credentials);
        $utilisateur= Auth::guard('admin-check')->user();
        return ["token" => $token,
                 "user" => $utilisateur];
    }
    public function Plogin(Request $req){
        $credentials=[
            'email' => $req->email,
            'password' => $req->password,
        ];
        $token=Auth::guard('prof-check')->attempt($credentials);
        $utilisateur= Auth::guard('prof-check')->user();
        return ["token" => $token,
                 "user" => $utilisateur];
    }
    public function Elogin(Request $req){
        $credentials=[
            'email' => $req->email,
            'password' => $req->password,
        ];
        $token=Auth::guard('etudiant-check')->attempt($credentials);
        $utilisateur= Auth::guard('etudiant-check')->user();
        return ["token" => $token,
                 "user" => $utilisateur];
    }
}
