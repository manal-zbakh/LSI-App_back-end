<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemestreController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\SuitController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AvoirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AssignGuard;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Acces pour etudiant et admine
Route::middleware(['auth.guard:etudiant-api | admin-api'])->group(function () {
Route::get('getSeance/{id}',[AvoirController::class,'getSeanceEtu']);
});
// Acces pour etudiant et admine
Route::middleware(['auth.guard:prof-api | admin-api'])->group(function () {
Route::get('getpf/{id}',[ProjetController::class,'getpfe']);
});
// Authentification 
Route::post('/login_admin',[AuthController::class,'Alogin']);
Route::post('/login_prof',[AuthController::class,'Plogin']);
Route::post('/login_etudiant',[AuthController::class,'Elogin']);
// Acces juste pour admine
Route::middleware(['auth.guard:admin-api'])->group(function () {
Route::get('deletetu/{id}',[EtudiantController::class,'delete']);
Route::get('getetudiantsby/{id}',[EtudiantController::class,'getEtbysemestre']); 
Route::get('getmoduleby/{id}',[ModuleController::class,'modules']);
Route::get('/getprofs',[ProfController::class,'getAll']);
Route::post('/seanceadd',[SeanceController::class,'add']);
Route::post('/avoiradd',[AvoirController::class,'add']);
Route::get('/deletemodule/{id}',[ModuleController::class,'delete']);
Route::post('/addpfe',[ProjetController::class,'addpfe']);
Route::post('/updatepfe',[ProjetController::class,'update']);
Route::post('/addmodule',[ModuleController::class,'add']);
Route::post('/updatemodule',[ModuleController::class,'update']);
Route::post('/addetu',[EtudiantController::class,'add']);
Route::post('/updateetu',[EtudiantController::class,'update']);
Route::post('/addprof',[ProfController::class,'add']);
Route::post('/updateprof',[ProfController::class,'update']);
Route::get('getlibre/{j}/{h}',[AvoirController::class,'getlibre']);
Route::get('checkdate/{id}/{s}',[AvoirController::class,'checkdate']);
Route::get('deleteprof/{id}',[ProfController::class,'delete']);
Route::get('getsalle',[SalleController::class,'get']);
Route::get('delpfe/{id}',[ProjetController::class,'delpfe']);});
Route::get('getnotpfe',[ProjetController::class,'getnotpfe']);
// Acces juste pour prof
Route::middleware(['auth.guard:prof-api'])->group(function () {
Route::get('/getSeanceprof/{id}',[AvoirController::class,'getSeanceprof']);
Route::post('/setnote',[SuitController::class,'setNote']); 
Route::get('getcours/{id}',[ProfController::class,'getcours']); 
Route::get('getNotes/{id}',[SuitController::class,'getNotes']); 
});
// // Acces juste pour etudiant
Route::middleware(['auth.guard:etudiant-api'])->group(function () {
Route::get('getpfetu/{id}',[ProjetController::class,'getpfeetu']); 
Route::get('getNotees/{id}',[SuitController::class,'getNotesetu']);
Route::get('getmescours/{id}',[EtudiantController::class,'getModule']);
});
  