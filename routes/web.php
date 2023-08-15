<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
 
Route::resource('livros', LivroController::class);
//Route::get('edit',[LivroController::class, 'index'])->name('edit.index');

Route::get('/', function () {
    return view('welcome');
});
?>