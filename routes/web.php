<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $todos = [];
    if (auth()->check()) {
        $todos = auth()->user()->usersCoolTodos()->latest()->get(); // latest() selects all by DESC order
    }
    return view('welcome', ['todos' => $todos]);
});



// Auth related routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);


// The todo related routes
Route::get('/create', [TodoController::class, 'showCreateForm']);
Route::post('/create-todo', [TodoController::class, 'create']);

Route::get('/edit-todo/{todo}', [TodoController::class, 'showEditForm']);
Route::put('/update-todo/{todo}', [TodoController::class, 'update']);
Route::delete('/delete-todo/{todo}', [TodoController::class, 'deleteTodo']);

