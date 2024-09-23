<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JiriController;

Route::get('/', [JiriController::class, 'index'])->name('jiri.home');

Route::get('/jiris', [JiriController::class, 'index'])->name('jiri.index');
Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiri.create');
Route::post('/jiri', [JiriController::class, 'store'])->name('jiri.store');
Route::patch('/jiri/{jiri}', [JiriController::class, 'update'])->name('jiri.update');
Route::delete('/jiri/{jiri}', [JiriController::class, 'destroy'])->name('jiri.destroy');
Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])->name('jiri.edit');
Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->name('jiri.show');

Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');

Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show');
