<?php

use App\Http\Controllers\UserController;
use App\Models\Task;
use App\Models\User;
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
Route::resource('users',UserController::class);
Route::get('/search', [UserController::class, 'search'])->name('users.search');

Route::get('manyToMany', function () {
    $user = User::find(1);
    dd($user->tasks->toArray());
});

Route::get('manyToMany2', function () {
    $task = Task::find(2);
    dd($task->users->toArray());
});
