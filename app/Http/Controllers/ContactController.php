<?php

namespace App\Http\Controllers;

use App\Events\ContactPhotoStored;
use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory|Application
    {
        $contacts = Auth::user()->contacts()->get();
        return view('contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('photo')) {
            $validated['photo'] = Storage::putFile('contacts/' . Auth::id() . '/original', $request->file('photo'));

           ContactPhotoStored::dispatch($validated);
        }

        $contact = Auth::user()->contacts()->create($validated);

        return to_route('contact.show', $contact);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact): View|Factory|Application
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View|Factory|Application
    {
        return view('contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUpdateRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return to_route('contact.show', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return to_route('contact.index');
    }
}
