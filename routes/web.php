<?php
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('task', \App\Http\Controllers\TaskController::class);
Route::resource('subtask', \App\Http\Controllers\SubTaskController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth:sanctum')->get('/tasks');


Route::apiResource('tasks',\App\Http\Controllers\API\TaskController::class);

// Route::get('spa', \App\Http\Controllers\SpaController::class)->where('any','.*');
