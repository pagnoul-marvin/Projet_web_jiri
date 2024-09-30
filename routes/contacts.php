<?php

use App\Http\Controllers\ContactController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::patch('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contact.show');
});

