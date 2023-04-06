<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load(['images']);
        return inertia(
            'Realtor/ListingImage/Create',
            [
                'listing' => $listing,
            ]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        if ($request->hasFile('images')) {
            $request->validate([
                'images.*' => 'mimes:jpeg,png,jpg|max:5000',
            ], [
                'images.*.mimes' => 'The file should be in one of the formats: jpg, jpeg, png.'
            ]);
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $listing->images()->save(
                    new ListingImage(
                        [
                            'filename' => $path,
                        ]
                    )
                );
            }
        }

        return redirect()->back()->with('success', 'Images uploaded!');
    }

    public function destroy($listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted!');
    }
}
