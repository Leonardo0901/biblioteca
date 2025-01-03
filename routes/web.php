<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

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



Route::post('/livroA',[LivroController::class,'store'])->name ('livros.store');
Route::get('/livroL',[LivroController::class,'index'])->name('livros.index');
Route::get('/livroD/{id}',[LivroController::class,'destroy'])->name('livros.destroy');


Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/register', function(){
    return view('perfil.register');
})->name('register');

Route::get('/perfil', function(){
    return view('perfil.index');
})->name('perfil.index');

Route::get('/livro', function(){
    return view('livro.index');
})->name('livro.index');

Route::get('/leitor', function(){
    return view('leitor.index');
})->name('leitor.index');

Route::get('/emprestimo', function(){
    return view('emprestimo.index');
})->name('emprestimo.index');

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

