<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Owner;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendindex()
    {
        $services = Service::all();
        $owners = Owner::all();
        return view('backend.manage_services', compact(['services', 'owners']));
    }

    public function ownerindex()
    {
        $services = Service::all();
        $owners = Owner::all();
        return view('backend.owner_dashboard.manage_service', compact(['services', 'owners']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendcreate()
    {
        return view('backend.manage_services');
    }

    public function owenrcreate()
    {
        return view('backend.owner_dashboard.manage_service');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function backendstore(StoreServiceRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'desc' => 'required|max:250',
            'service_image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        if ($request->hasFile('service_image')) {
            $file = $request->service_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/service_image/', $new_file);
        }
        Service::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "owner_id" => $request->owner,
            "service_image" => 'storage/service_image/' . $new_file

        ]);
        return redirect()->back();
    }

    public function ownerstore(StoreServiceRequest $request)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'desc' => 'required|max:250',
            'service_image' => 'required|mimes:jpeg,png,gif,jpg',
        ]);
        if ($request->hasFile('service_image')) {
            $file = $request->service_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/service_image/', $new_file);
        }
        Service::create([
            "title" => $request->title,
            "desc" => $request->desc,
            "owner_id" => $request->owner,
            "service_image" => 'storage/service_image/' . $new_file

        ]);
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function backendshow(Service $service)
    {
    }
    public function show(Service $service, $id)
    {
        $services = Service::find($id);
        // $owners=Owner::all();
        return view('publicSite.singleCompany', compact('services'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function backendedit($id)
    {
        $service = Service::find($id);
        $owners = Owner::all();
        return view('backend.updates.service_update', compact(['service', 'owners']));
    }


    public function owneredit($id)
    {
        $service = Service::find($id);
        $owners = Owner::all();
        return view('backend.owner_dashboard.updates.service_update', compact(['service', 'owners']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function backendupdate(UpdateServiceRequest $request, $id)
    {
        $service = Service::find($id);
        if ($request->hasFile('service_image')) {
            $file = $request->service_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/service_image/', $new_file);
            $service->service_image = 'storage/service_image/' . $new_file;
        }
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->owner_id = $request->owner;


        $service->update();
        return redirect()->route('service.index');
    }


    public function ownerupdate(UpdateServiceRequest $request, $id)
    {
        $service = Service::find($id);
        if ($request->hasFile('service_image')) {
            $file = $request->service_image;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/service_image/', $new_file);
            $service->service_image = 'storage/service_image/' . $new_file;
        }
        $service->title = $request->title;
        $service->desc = $request->desc;
        $service->owner_id = $request->owner;


        $service->update();
        return redirect()->route('owner_service.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function backenddestroy($request)
    {
        $service = Service::find($request);
        $service->delete();
        return redirect()->route('service.index');
    }

    
    public function ownerdestroy($request)
    {
        $service = Service::find($request);
        $service->delete();
        return redirect()->route('owner_service.index');
    }
}
