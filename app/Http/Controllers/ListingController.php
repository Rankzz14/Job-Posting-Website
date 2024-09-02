<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(12)
        ]);
    }
    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store(Request  $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => 'required',
            'logo'  => ['image', 'dimensions:min_width=100,min_height=100'],
            'description'  => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        $listing = Listing::create($formFields);

        return redirect('/')->with('success', 'Listing created successfully!')->with('postId', $listing->id);
    }

    public function edit(Listing  $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Post Data
    public function update(Request  $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => 'required',
            'logo'  => ['image', 'dimensions:min_width=100,min_height=100'],
            'description'  => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('success', 'Listing updated successfully!')->with('postId', $listing->id);
    }
    public function destroy(Listing $listing)
    {
        // Assuming `user_id` is the foreign key in the listings table
        if (auth()->id() === $listing->user_id) {
            $listing->delete();
            return redirect('/')->with('success', 'Listing deleted successfully!');
        } else {
            return back()->with('error', 'You do not have permission to delete this listing!');
        }
    }


    public function mylistings()
    {
        return view('/listings/mylistings', ['listings' => auth()->user()->listings()->paginate(12)]);
    }

    public function user(User $user)
    {
        $listings = $user->listings()->paginate(12);

        return  view(
            'listings.user',
            [
                'listings' => $listings,
                'user' =>  $user,
            ]
        );
    }
}

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing


// Aynı Notificationu User ve Listinde kullanamıyorum oyuzden kullanımını basite indirdim.
// You can visit the job <a href="/listings/{{ session('postId') }}" class="font-semibold underline hover:no-underline">here
