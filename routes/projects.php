<?php

use App\Http\Controllers\ProjectController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::patch('/project/{project}', [ProjectController::class, 'update'])->can('update', 'project')->name('project.update');
    Route::delete('/project/{project}', [ProjectController::class, 'destroy'])->can('delete', 'project')->name('project.destroy');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->can('update', 'project')->name('project.edit');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->can('view', 'project')->name('project.show');
});

