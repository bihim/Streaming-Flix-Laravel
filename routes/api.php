<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;

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

Route::post('/test', [VideoController::class, 'testVideo']);
Route::post('/video/add',[VideoController::class,'addVideo']);
Route::post('/video/justAdd',[VideoController::class,'justAddVideo']);
Route::get('/videos',[VideoController::class,'showAllVideo']);
Route::get('/videos/{id}',[VideoController::class,'showVideoById']);
Route::get('/featured',[VideoController::class,'featuredVideo']);
Route::get('/categories',[VideoController::class,'getCategories']);
Route::get('/categories/{category}',[VideoController::class,'getByCategories']);

/*Route::group([
    'middleware' => ['api', 'cors'],
    'namespace' => $this->namespace,
    'prefix' => 'api',
], function ($router) {
    //Add you routes here, for example:
    Route::post('/video/justAdd',[VideoController::class,'justAddVideo']);
});*/
