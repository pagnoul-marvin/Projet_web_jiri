<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Http\Requests\JiriUpdateRequest;
use App\Models\Assignement;
use App\Models\Attendance;
use App\Models\Jiri;
use App\Models\Project;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class JiriController extends Controller
{
    public function index(): View|Factory|Application
    {
        $upcomingJiris = Auth::user()?->upcomingJiris()->where('starting_at', '>', now())->get();
        $pastJiris = Auth::user()?->pastJiris()->where('starting_at', '<=', now())->get();
        return view('jiri.index', compact('upcomingJiris', 'pastJiris'));
    }

    public function create(): View|Factory|Application
    {
        $contacts = Auth::user()->contacts()->get();
        $projects = Auth::user()->projects()->get();
        return view('jiri.create', compact('contacts', 'projects'));
    }

    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $jiri = Auth::user()->jiris()->create($request->validated());

        if ($jiri) {
            foreach ($request->input('contacts') as $contact_id) {
                $role = $request->input('role-' . $contact_id);
                $jiri->contacts()->attach($contact_id, ['role' => $role]);
            }

            foreach ($request->input('projects') as $project_id) {
                $jiri->projects()->attach($project_id);
            }
        }

        return to_route('jiri.show', $jiri);
    }

    public function show(Jiri $jiri): View|Factory|Application
    {
        $jiri->load(['students', 'evaluators', 'projects']);

        $associated_projects_id = $jiri->projects->pluck('id')->toArray(); //on récupère les id des projets liés au Jiri

        $remaining_projects = Project::where('user_id', Auth::id())->whereNotIn('id', $associated_projects_id)->get();

        return view('jiri.show', compact('jiri', 'remaining_projects'));
    }

    public function edit(Jiri $jiri): View|Factory|Application
    {
        return view('jiri.edit', compact('jiri'));
    }

    public function update(JiriUpdateRequest $request, Jiri $jiri): RedirectResponse
    {
        $jiri->update($request->validated());

        return to_route('jiri.show', $jiri);
    }

    public function destroy(Jiri $jiri): RedirectResponse
    {
        $jiri->delete();

        return to_route('jiri.index');
    }
}
