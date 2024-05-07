<?php

namespace App\Http\Controllers;

use App\Models\Location;
// use Illuminate\Support\Str;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LocationController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $locations = Location::orderBy('created_at', 'desc')->paginate(5);
        return view('locations.index', compact('locations'));
    }


    // public function create()
    // {
    //     return view('locations.create');

    // }


    public function store(Request $request)
    {
        // $request->validate([
        //     'location_id' => 'required',
        //     'name' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'email' => 'required|email',
        //     'website' => 'required|url',
        //     'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'longitude' => 'required',
        //     'latitude' => 'required',
        //     'status' => 'required',
        // ]);

        // $location = new Location();
        // $location->location_id = $request->location_id;
        // $location->name = $request->name;
        // $location->address = $request->address;
        // $location->phone = $request->phone;
        // $location->email = $request->email;
        // $location->website = $request->website;
        // $location->description = $request->description;
        // $location->longitude = $request->longitude;
        // $location->latitude = $request->latitude;
        // $location->status = $request->status;

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $name = Str::slug($request->name).'.'.$image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $name);
        //     $location->image = $name;
        // }

        //  $location->save();


        Location::create([
            'location_id' => $request->location_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'website' => $request->website,
            'description' => $request->description,
            'image' => $request->image,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'status' => $request->status
        ]);
// dd($location);
        return redirect()->route('locations.index')
            ->withSuccess('Location created successfully.');
    }


    public function show(Location $location)
    {
        return view('locations.show', compact('location'));


    }


// controller to edit location

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));

    }


    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'location_id' => 'required',
    //         'name' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required',
    //         'website' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //         'longitude' => 'required',
    //         'latitude' => 'required',
    //         'status' => 'required'
    //     ]);

    //     $location = Location::find($id);
    //     $location->location_id = $request->location_id;
    //     $location->name = $request->name;
    //     $location->address = $request->address;
    //     $location->phone = $request->phone;
    //     $location->email = $request->email;
    //     $location->website = $request->website;
    //     $location->description = $request->description;
    //     $location->image = $request->image;
    //     $location->longitude = $request->longitude;
    //     $location->latitude = $request->latitude;
    //     $location->status = $request->status;
    //     $location->save();

    //     return redirect()->route('locations.index')
    //         ->with('success', 'Location updated successfully');
    // }



    public function update(Request $request, Location $location)
    {
        $request->validate([

            'name' => 'required',
        ]);

        $location->update($request->all());

        return redirect()->route('locations.index')
            ->withSuccess('Location updated successfully');
    }



    }
