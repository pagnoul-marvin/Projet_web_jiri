<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceUpdateRequest;
use App\Models\Attendance;
use Request;

class AttendanceController extends Controller
{
    public function update(AttendanceUpdateRequest $request, Attendance $attendance)
    {
        $attendance->update($request->validated());

        return to_route('jiri.show', $attendance->jiri_id);
    }
}
