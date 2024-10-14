<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignementStoreRequest;
use App\Models\Assignement;
use App\Models\Jiri;

class AssignementController extends Controller
{
    public function destroy(Assignement $assignement)
    {
        $assignement->delete();

        return to_route('jiri.show', $assignement->jiri_id);
    }

    public function store(AssignementStoreRequest $request)
    {
        $jiri_id = $request->jiri_id;

        $jiri = Jiri::find($jiri_id);

        $jiri->projects()->attach($request->project_id);

        return to_route('jiri.show', $jiri_id);
    }
}
