<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|unique:contacts,email',
            'phone'   => 'required|digits_between:8,15',
            'gender'  => 'required|in:Male,Female',
            'country' => 'required|in:India,USA,UK',
            'hobbies' => 'nullable|array',
        ]);

        // Create new record manually (static form)
        $contact = new Contact();
        $contact->name    = $request->input('name');
        $contact->email   = $request->input('email');
        $contact->phone   = $request->input('phone');
        $contact->gender  = $request->input('gender');
        $contact->country = $request->input('country');
        $contact->hobbies = $request->has('hobbies')
            ? implode(',', $request->input('hobbies'))
            : null;

        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|unique:contacts,email,' . $contact->id,
            'phone'   => 'required|digits_between:8,15',
            'gender'  => 'required|in:Male,Female',
            'country' => 'required|in:India,USA,UK',
            'hobbies' => 'nullable|array',
        ]);

        $contact->name    = $request->input('name');
        $contact->email   = $request->input('email');
        $contact->phone   = $request->input('phone');
        $contact->gender  = $request->input('gender');
        $contact->country = $request->input('country');
        $contact->hobbies = $request->has('hobbies')
            ? implode(',', $request->input('hobbies'))
            : null;

        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contact deleted!');
    }
}
