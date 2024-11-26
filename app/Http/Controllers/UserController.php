<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->when($request->input('name'), function ($query, $name) {
                $query->where('name', 'like', '%' . $name . '%')
                    ->orWhere('email', 'like', '%' . $name . '%');
            })
            ->orderByRaw("CASE
                WHEN role = 'admin' THEN 1
                WHEN role = 'user' THEN 2
                ELSE 3
            END")
            ->paginate(10);

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user',
        ]);


         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

         $user->assignRole($request->role);

         return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function profil($id)
    {
        $user = User::findOrFail($id);

        return view('pages.users.profile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
        ]);


        $user = User::findOrFail($id);


        $user->name = $request->input('name');
        $user->email = $request->input('email');


        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }


        $user->save();


        return redirect()->route('user.profil', $id)->with('success', 'Profile updated successfully');
   }


    public function edit($id)
    {
        $user = User::findOrFail($id);
    
        $roles = Role::all();
        return view('pages.users.edit', compact('user', 'roles'));
    }

        //update
        public function update(Request $request, $id)
        {
        $data = $request->all();
        $user = User::findOrFail($id);

        //check if password is not empty
        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        } else {
            //if password is empty, then use the old password
            $data['password'] = $user->password;
        }
        $user->update($data);
        $user->assignRole($request->role);
        return redirect()->route('user.index') ->with('success', 'User updated successfully');

        }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
