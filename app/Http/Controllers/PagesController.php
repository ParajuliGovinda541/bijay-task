<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    //

    public function index()
    {
        $contacts= Contact::all();
        return view('dashboard',compact('contacts'));
    }

    public function store(Request $request)
    {

        // dd($request);
        // Validate the request data
        $request->validate([
            'first_name' =>'required|max:255',
            'last_name' =>'required|max:255',
            'telegram_id' =>'required|max:255',
            'description' =>'required|max:255',
        ]);

        // Store the user data in the database
        $contacts = Contact::create($request->all());

        return redirect('/')->with('success', 'Contact sent successfully');
    }
}
