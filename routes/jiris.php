<?php

use App\Http\Controllers\JiriController;

//HOME

//Route::get('/', [JiriController::class, 'index'])->name('jiri.home');


//JIRIS

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jiris', [JiriController::class, 'index'])->name('jiri.index');
    Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiri.create');
    Route::post('/jiri', [JiriController::class, 'store'])->name('jiri.store');
    Route::patch('/jiri/{jiri}', [JiriController::class, 'update'])->can('update', 'jiri')->name('jiri.update');
    Route::delete('/jiri/{jiri}', [JiriController::class, 'destroy'])->can('delete', 'jiri')->name('jiri.destroy');
    Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])->can('update', 'jiri')->name('jiri.edit');
    Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->can('view','jiri')->name('jiri.show');
});
