<?php

use App\Http\Controllers\AttendanceController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::patch('/attendance/{attendance}', [AttendanceController::class, 'update'])
        ->can('update', 'attendance')
        ->name('attendance.update');
});
