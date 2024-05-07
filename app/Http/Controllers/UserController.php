<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\Usertype;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // $users = User::all();
        $users = User::with('usertypes', 'locations','roles')-> orderBy('created_at', 'desc')->paginate(5);
        $usertypes = Usertype::all();
        $usertype = Usertype::all();
        $location = Location::all();
        $locations = Location::all();
        $role = Role::all();
         $roles = Role::pluck('name','name')->all();
         $rolenames = Role::pluck('name', 'id')->all();
        //   dd($roles);
        //   $userRole = $users->roles->pluck('name','name')->all();
        //  dd($userRole);
        foreach ($users as $user) {
            $userRole = $user->roles->pluck('name','name')->all();
            // Do something with $userRole
        }
        return view('users.index', compact('users', 'usertype', 'usertypes', 'location','locations', 'role' , 'roles', 'rolenames' , 'userRole'));
    }

    //create

    public function create()
    {
        return view('users.create');
    }

    //store

    public function store(Request $request)
    {
        $request->validate([

            'email'=> 'required',
            'username'=> 'required',
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        // Dd($input);

        $user = User::create($input);
        //  $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
            ->withSuccess('User created successfully.')->with('alert-type', 'success');

    }

    //show

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //edit

    public function edit(Usertype $usertype)
    {
        // return response()->json([
        //     'user_id' => $usertype->usertype_id,
        //     'email' => $usertype->email,
        //     'phone' => $usertype->phone,
        //     'address' => $usertype->address,
        // ]);
    }

    //update

    public function update(Request $request, User $user)
    {
        $request->validate([


            'email'=> 'required',

        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        // $user = User::find($user);
        $user->update($input);
        // $user->update($input);
        // DB::table('model_has_roles')->where('model_id',$user)->delete();

        // $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');

        return redirect()->route('users.index')
            ->withSuccess('User updated successfully');
    }

    //destroy

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully')->with('alert-type', 'danger');
    }





}
