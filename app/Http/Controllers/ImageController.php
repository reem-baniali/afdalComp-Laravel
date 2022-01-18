<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Owner;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendindex()
    {
        $images = Image::all();
        $owners = Owner::all();
        return view('backend.manage_image', compact(['images', 'owners']));
    }

    public function ownerindex()
    {
        $images = Image::all();
        $owners = Owner::all();
        return view('backend.owner_dashboard.manage_images', compact(['images', 'owners']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendcreate()
    {
        return view('backend.manage_image');
    }
    public function ownercreate()
    {
        return view('backend.owner_dashboard.manage_images');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function backendstore(StoreImageRequest $request)
    {
        $this->validate($request, [

            'image' => 'required|mimes:jpeg,png,gif,jpg',
            'image_alt' => 'required|max:250',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/images_image/', $new_file);
        }
        Image::create([
            "image_alt" => $request->image_alt,
            "owner_id" => $request->owner,
            "image" => 'storage/images_image/' . $new_file

        ]);
        return redirect()->back();
    }
    public function ownerstore(StoreImageRequest $request)
    {
        $this->validate($request,[

            'image'=>'required|mimes:jpeg,png,gif,jpg',
            'image_alt'=>'required|max:250',
          ]);
          if($request->hasFile('image')){
              $file=$request->image;
              $new_file=time().$file->getClientOriginalName();
              $file->move('storage/images_image/',$new_file);
          }
         Image::create([
              "image_alt"=>$request->image_alt,
              "owner_id"=>$request->owner,
              "image"=>'storage/images_image/'.$new_file

         ]);
         return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function backendshow(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function backendedit($id)
    {
        $image = Image::find($id);
        $owners = Owner::all();
        return view('backend.updates.image_update', compact(['image', 'owners']));
    }


    public function owneredit($id)
    {
        $image=Image::find($id);
        $owners=Owner::all();
        return view('backend.owner_dashboard.updates.image_update',compact(['image','owners']));

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageRequest  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function backendupdate(UpdateImageRequest $request, $id)
    {
        $image = Image::find($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/images_image/', $new_file);
            $image->image = 'storage/images_image/' . $new_file;
        }

        $image->image_alt = $request->image_alt;
        $image->owner_id = $request->owner;


        $image->update();
        return redirect()->route('image.index');
    }


    public function ownerupdate(UpdateImageRequest $request,$id)
    {
        $image=Image::find($id);
        if($request->hasFile('image')){
            $file=$request->image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/images_image/',$new_file);
            $image->image='storage/images_image/'.$new_file;

        }

        $image->image_alt=$request->image_alt;
        $image->owner_id=$request->owner;


        $image->update();
        return redirect()->route('owner_image.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function backenddestroy($request)
    {
        $image = Image::find($request);
        $image->delete();


        return redirect()->route('image.index');
    }

    public function ownerdestroy($request)
    {
        $image=Image::find($request);
        $image->delete(); 


        return redirect()->route('owner_image.index');    }
}
