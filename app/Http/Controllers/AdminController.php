<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendindex()
    {
        $admins=Admin::all();
        return view('backend.manage_admin',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendcreate()
    {
        return view('backend.manage_admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function backendstore(StoreAdminRequest $request)
    {
        
        $this->validate($request,[
            'name'=>'required|max:250',
            'email'=>'required|max:250',
            'password'=>'required|max:250',
           
          ]);
          
          Admin::create([
              "name"=>$request->name,
              "email"=>$request->email,
              "password"=>$request->password,
              

         ]);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function backendshow(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function backendedit($id)
    {
        $admin=Admin::find($id);
        return view('backend.updates.admin_update',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function backendupdate(UpdateAdminRequest $request, $id)
    {
        $admin=Admin::find($id);
       
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=$request->password;

        $admin->update();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function backenddestroy($id)
    {
        $admin=Admin::find($id);
        $admin->destroy($id);

        return redirect()->route('admin.index');
    }
}
