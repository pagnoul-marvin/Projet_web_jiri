<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Http\Requests\JiriUpdateRequest;
use App\Models\Attendance;
use App\Models\Jiri;
use App\Models\User;
use Auth;
use Gate;
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
        return view('jiri.create', compact('contacts'));
    }

    public function store(JiriStoreRequest $request): RedirectResponse
    {
        $jiri_id = Auth::user()->jiris()->create($request->validated());

        if ($jiri_id) {
            foreach ($request->input('contacts') as $contact_id) {
                $role = $request->input('role-' . $contact_id);
                $jiri_id->contacts()->attach($contact_id, ['role' => $role]);
            }
        }

        return to_route('jiri.show', $jiri_id);
    }

    public function show(Jiri $jiri): View|Factory|Application
    {
        $jiri->load(['students', 'evaluators']);
        return view('jiri.show', compact('jiri'));
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
