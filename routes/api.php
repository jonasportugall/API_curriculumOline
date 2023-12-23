<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/products','ApiController@getAllProducts');





/*======================== INSERTS====================================*/



/*======================== GETS====================================*/
Route::get('/teste', [ApiController::class, 'teste']);
Route::get('create_provinces_and_counties', [ApiController::class, 'createProvincesWithCountys']);
Route::get('provincies', [ApiController::class, 'getAllProvincies']);
Route::post('storee',[ApiController::class,'createCurriculum'])->withoutMiddleware(['csrf']);


/*======================== UPDATES=================================*/


/*======================== DELETES=================================*/














