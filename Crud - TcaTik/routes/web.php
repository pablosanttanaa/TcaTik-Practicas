<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriaController;
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

// Ruta principal, muestra el índice del CRUD
Route::get('/', [CrudController::class, 'index'])->name('crud.index');

// Ruta para añadir un nuevo producto
Route::post('/registrar-producto', [CrudController::class, 'create'])->name('crud.create');

// Ruta para modificar un producto
Route::post('/modificar-producto', [CrudController::class, 'update'])->name('crud.update');

// Ruta para eliminar un producto
Route::get('/eliminar-producto-{id}', [CrudController::class, 'delete'])->name('crud.delete');

// Ruta para ver todos los almacenes
Route::get('/ver-almacenes', [AlmacenController::class, 'showAll'])->name('ver.almacenes');

// Ruta para registrar un nuevo almacén
Route::post('/registrar-almacen', [AlmacenController::class, 'create'])->name('create.almacen');

// Ruta para eliminar un almacén
Route::delete('/delete-almacen/{id}', [AlmacenController::class, 'delete'])->name('delete.almacen');

// Ruta para ver todas las categorías
Route::get('/ver-categorias', [CategoriaController::class, 'showAll'])->name('ver.categorias');

// Ruta para crear una nueva categoría
Route::post('/registrar-categoria', [CategoriaController::class, 'create'])->name('create.categoria');

// Ruta para eliminar una categoría
Route::delete('/eliminar-categoria-{id}', [CategoriaController::class, 'delete'])->name('delete.categoria');
