<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show create form
    public function create(){
        return view('listings.create');

    }

    // Store Listing Data
    public function store(Request $request){
       $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => 'required',
            'description' => 'required'
       ]);
       Listing::create($formFields);

       return redirect('/')->with('message', 'Listing Created Successfully!');
    }
}
