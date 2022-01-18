<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = User::all();
        return view('publicSite.userProfile', compact('user'));
    }
    public function backendindex()
    {
        $users = User::all();
        return view('backend.manage_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function backendcreate()
    {
        return view('backend.manage_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    public function backendstore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'email' => 'required|max:250',
            'password' => 'required|max:250',
            'image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/user_images/', $new_file);
        }
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "image" => 'storage/user_images/' . $new_file

        ]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('publicSite.edit', compact('user'));
    }

    //backend
    public function backendedit($id)
    {
        $user = User::find($id);
        return view('backend.updates.user_update', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('images/', $new_file);
            $user->image = 'images/' . $new_file;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city = $request->city;
        // dd()
        $user->update();
        return redirect()->route('users.index');
    }

    public function backendupdate(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/user_images/', $new_file);
            $user->image = 'storage/user_images/' . $new_file;
        }
        $user->name = $request->name;
        $user->name = $request->name;


        $user->update();
        return redirect()->route('user.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function backenddestroy($request)
    {
        $user = User::find($request);
        $user->delete();
        return redirect()->route('user.index');
    }
}
