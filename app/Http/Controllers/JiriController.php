<?php

namespace App\Http\Controllers;

use App\Models\Jiri;
use http\Env\Response;
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
    public function store(Request $request)
    {
        $jiri = Jiri::create($request->all());

        return redirect('/jiris/' . $jiri->id); //ou redirect()->route(jiri.show, $jiri->id)

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
