<?php

namespace App\Http\Controllers;

use App\Http\Requests\JiriStoreRequest;
use App\Http\Requests\JiriUpdateRequest;
use App\Models\Jiri;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JiriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upcomingJiris = Jiri::where('starting_at', '>', now())->orderBy('starting_at')->get();
        $pastJiris = Jiri::where('starting_at', '<=', now())->orderBy('starting_at', 'desc')->get();
        return view('jiri.index', compact('upcomingJiris', 'pastJiris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jiri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JiriStoreRequest $request):RedirectResponse
    {
        $jiri = Jiri::create($request->validated());

        return to_route('jiri.show', $jiri);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jiri $jiri)
    {
        return view('jiri.show', compact('jiri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jiri $jiri)
    {
        return view('jiri.edit', compact('jiri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JiriUpdateRequest $request, Jiri $jiri)
    {
        $jiri->update($request->validated());

        return to_route('jiri.show', $jiri);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jiri $jiri)
    {
        $jiri->delete();

        return to_route('jiri.index');
    }
}
