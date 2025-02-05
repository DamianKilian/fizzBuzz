<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('persons.index', [
            'persons' => Person::latest()->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        Person::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'tel' => $request->tel,
            'sms_sub' => !!$request->smsSub,
            'email_sub' => !!$request->emailSub,
        ]);
        return redirect()->route('persons.index')
            ->withSuccess('New person is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('persons.show', [
            'person' => $person
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('persons.edit', [
            'person' => $person
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePersonRequest $request, Person $person)
    {
        $person->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'tel' => $request->tel,
            'sms_sub' => !!$request->smsSub,
            'email_sub' => !!$request->emailSub,
        ]);
        return redirect()->back()
            ->withSuccess('Person is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('persons.index')
                ->withSuccess('Person is deleted successfully.');
    }
}
