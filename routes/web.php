<?php

use App\Http\Controllers\TaskController;
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



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//laravel 7
//Route::get('/tasks/create','TaskController@create');

//laravel 8
//Route::resource('tasks', TaskController::class);


Route::middleware(['auth:sanctum'])->get('tasks',[TaskController::class, 'index']);             //tasks.index
Route::middleware(['auth:sanctum'])->post('tasks',[TaskController::class, 'store']);          //tasks.store
Route::middleware(['auth:sanctum'])->get('tasks/create',[TaskController::class, 'create']);  //tasks.create
Route::middleware(['auth:sanctum'])->delete('tasks/delete/{task}',[TaskController::class, 'destroy']); //tasks.destroy
Route::middleware(['auth:sanctum'])->patch('tasks/{task}',[TaskController::class, 'update']); // tasks.update
Route::middleware(['auth:sanctum'])->get('tasks/{task}',[TaskController::class, 'show']);    // tasks.show
Route::middleware(['auth:sanctum'])->get('tasks/edit/{task}',[TaskController::class, 'edit']); // tasks.edit
