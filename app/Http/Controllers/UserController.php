<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = user::all();
        return view('welcome', compact('users'));
    }
    //for show index route
    public function create()
    {
       return view('userDetails');
    }
    //for open add forms
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'user_city' => 'required|string',
            'user_gender' => 'required',
        ]);
        $users = new user;
        $users->user_name = $request->user_name;
        $users->user_city = $request->user_city;
        $users->user_gender = $request->user_gender;
        $users->save();
        return redirect()->route('user.index')
        ->with('success', 'User Added Successfully!');
    }
    //for store add form data
    public function show(user $user)
    {
        $users = user::find($user->user_id);
        $readonly = true; 
        return view('userDetails', compact('users', 'readonly'));
    }
    //for read datan
    public function edit(user $user)
    {
        $users = user::find($user->user_id);
        return view('userDetails',compact('users'));
    }
    //for open update form
    public function update(Request $request, user $user)
    {
        return $request;
        $request->validate([
            'user_name' => 'required|string',
            'user_city' => 'required|string',
            'user_gender' => 'required',
        ]);
        $users = user::find($user->user_id);
        $users->user_name = $request->user_name;
        $users->user_city = $request->user_city;
        $users->user_gender = $request->user_gender;
        $users->save();
        return redirect()->route('user.index')
        ->with('success', 'User Updated Successfully!');
    }
    //for update data
    public function destroy(user $user)
    {
        $users = user::find($user->user_id);
        $users->delete();
        return redirect()->route('user.index')
               ->with('error','User Deleted SuccessFully!');
    }
    //for delete data
}
