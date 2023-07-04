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
            'logo' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,svg', 'max:2048'],
            'description' => 'required'
       ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;
       Listing::create($formFields);

       return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    // Show edit form
    public function edit(Listing $listing){
        return view('Listings.edit', [
            'listing' => $listing
        ]);
    }

    // Update existing Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Make sure logged in user own that listing
        if($listing->user_id != auth()->user()->id){
           abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
             'website' => ['required', 'url'],
            'tags' => 'required' ,
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    // Delete a listing
    public function delete(Listing $listing){
        // Make sure logged in user own that listing
        if ($listing->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }

    public function manage(){
        return view('listings.manage', [
            'listings' => Listing::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
  