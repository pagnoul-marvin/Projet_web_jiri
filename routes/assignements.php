<?php


use App\Http\Controllers\AssignementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::delete('/assignement/{assignement}', [AssignementController::class, 'destroy'])
        ->can('delete', 'assignement')
        ->name('assignement.destroy');

    Route::post('/assignement', [AssignementController::class, 'store'])
        ->name('assignement.store');
});
