<?php

namespace App\Http\Controllers;

use App\Models\Usertype;
use Illuminate\Http\Request;

class UsertypeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Usertype  $usertype
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Usertype $usertype)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Usertype  $usertype
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Usertype $usertype)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Usertype  $usertype
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Usertype $usertype)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Usertype  $usertype
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Usertype $usertype)
    // {
    //     //
    // }



    // index controller for usertype

    public function index()
    {
        $usertypes = Usertype::paginate(10);
        return view('usertypes.index', compact('usertypes'));
    }

    // create controller for usertype

    public function create()
    {
        return view('usertypes.create');
    }

    // store controller for usertype

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',


        ]);

        Usertype::create($request->all());

        return redirect()->route('usertypes.index')
            ->withSuccess('Usertype created successfully.');

    }

    // show controller for usertype

    public function show(Usertype $usertype)
    {
        return view('usertypes.show', compact('usertype'));
    }


    // edit controller for usertype

    public function edit(Usertype $usertype)
    {
        return response()->json([
            'usertype_id' => $usertype->usertype_id,
            'name' => $usertype->name,
        ]);
    }


    // update controller for usertype


    public function update(Request $request, Usertype $usertype)
    {
        $request->validate([

            'name' => 'required',

        ]);

        $usertype->update($request->all());

        return redirect()->route('usertypes.index')
            ->withSuccess('Usertype updated successfully');
    }

    // destroy controller for usertype

    public function destroy(Usertype $usertype)
    {
        $usertype->delete();

        return redirect()->route('usertypes.index')
            ->withDanger('Usertype deleted successfully');
    }




}
