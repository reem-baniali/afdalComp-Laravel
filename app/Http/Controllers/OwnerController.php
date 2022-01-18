<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StoreOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::paginate(6);
        $categories = Category::all();
        return view('publicSite.companies', compact(['owners', 'categories']));
    }

    public function getcompanies()
    {
        $users           = User::all();
        $owner           = Owner::all();
        $category        = Category::all();
        $reviews         = Review::all();
        $owner_counter   = count($owner);
        $users_counter   = count($users);
        $reviews_counter = count($reviews);
        $companies = Owner::limit(6)->get();
        return view('publicSite.index', compact(['owner', 'category', 'owner_counter', 'users_counter', 'reviews_counter', 'companies']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerRequest $request)
    {
        //
    }
    //owner
    public function ownerindex()
    {
        $owners     = Owner::all();
        $categories = Category::all();
        // $singleOwner = Owner::find($id);
        return view('backend.owner_dashboard.manage_profile', compact(['owners', 'categories']));
    }

    public function backendindex()
    {
        $owners     = Owner::all();
        $categories = Category::all();
        return view('backend.manage_owner', compact(['owners', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function backendcreate()
    {
        return view('backend.manage_owner');
    }


    public function backendstore(StoreOwnerRequest $request)
    {
        $this->validate($request, [
            'owner_name'       => 'required|max:250',
            'company_name'     => 'required|max:250',
            'owner_email'      => 'required|max:250',
            'company_email'    => 'required|max:250',
            'password'         => 'required|max:250',
            'desc'             => 'required|max:250',
            'num_of_employees' => 'required|max:250',
            'address'          => 'required|max:250',
            'logo'             => 'required|mimes:jpeg,png,gif,jpg',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/owner_images/', $new_file);
        }

        Owner::create([
            "owner_name"       => $request->owner_name,
            "company_name"     => $request->company_name,
            "owner_email"      => $request->owner_email,
            "company_email"    => $request->company_email,
            "password"         => $request->password,
            "desc"             => $request->desc,
            "num_of_employees" => $request->num_of_employees,
            "address" => $request->address,
            "category_id" => $request->category,
            "logo" => 'storage/owner_images/' . $new_file

        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $avg_rate = '';
        $categories   = Category::all();
        $singleOwners = Owner::find($id);
        $users        = User::all();
        $comments     = Comment::where('owner_id', $id)->paginate(3);
        $services      = Service::all();
        $rate_count   = 0;
        foreach ($comments as $comment) {
            $rate_count += $comment->like;
        }
        if (count($comments) != 0) {
            $avg_rate = round(($rate_count / count($comments)), 1);
        }

        $rate_num = count($comments);

        return view(
            'publicSite.singleCompany',
            compact('categories', 'singleOwners', 'users', 'comments', 'avg_rate', 'rate_num', 'services')
        );
    }

    public function showcompany(Owner $owner)
    {
        $category = Category::all();

        return view('publicSite.userProfile', compact(['owner', 'category']));
    }

    public function ownershow($id)
    {
        $singleowner = Owner::find($id);
        return view('backend.owner_dashboard.manage_profile', compact('singleowner'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        //
    }
    public function backendedit($id)
    {
        $owner = Owner::find($id);
        $categories = Category::all();
        return view('backend.updates.owner_update', compact(['owner', 'categories']));
    }
    //edit owner
    public function owneredit($id)
    {
        $owner = Owner::find($id);
        $categories = Category::all();
        return view('backend.owner_dashboard.updates.owner_update', compact(['owner', 'categories']));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerRequest  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    public function backendupdate(UpdateOwnerRequest $request, $id)
    {
        $owner = Owner::find($id);
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/owner_images/', $new_file);
            $owner->logo = 'storage/owner_images/' . $new_file;
        }

        $owner->owner_name = $request->owner_name;
        $owner->company_name = $request->company_name;
        $owner->owner_email = $request->owner_email;
        $owner->company_email = $request->company_email;
        $owner->password = $request->password;
        $owner->desc = $request->desc;
        $owner->num_of_employees = $request->num_of_employees;
        $owner->address = $request->address;
        $owner->category_id = $request->category;
        $owner->update();


        return redirect()->route('owner.index');
    }
    //owner
    public function ownerupdate(UpdateOwnerRequest $request, $id)
    {
        $owner = Owner::find($id);
        if ($request->hasFile('logo')) {
            $file = $request->logo;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('storage/owner_images/', $new_file);
            $owner->logo = 'storage/owner_images/' . $new_file;
        }
        $owner->owner_name = $request->owner_name;
        $owner->company_name = $request->company_name;
        $owner->owner_email = $request->owner_email;
        $owner->company_email = $request->company_email;
        $owner->password = $request->password;
        $owner->desc = $request->desc;
        $owner->num_of_employees = $request->num_of_employees;
        $owner->address = $request->address;
        $owner->category_id = $request->category;
        $owner->update();
        return redirect()->route('owner_profile.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        //
    }
    public function backenddestroy($request)
    {
        $owner = Owner::find($request);
        $owner->delete();
        return redirect()->route('owner.index');
    }
    //owner
    public function ownerdestroy($request)
    {
        $owner = Owner::find($request);
        $owner->delete();
        return redirect()->route('owner_profile.index');
    }

    ///login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:5|max:30',
        ]);

        $email    = $request->email;
        $password = $request->password;

        $owners   = Owner::all();
        $admins   = Admin::all();


        foreach ($admins as $admin) {
            if ($admin->email === $email && $password === $admin->password) {

                //redirect to admin dashboard
                return redirect()->route('admin.index');
            } else {
                foreach ($owners as $owner)
                    if ($owner->owner_email === $email && $password === $owner->password) {
                        //redirect to admin dashboard
                        return redirect()->route('owner_profile.index', $owner->id);
                    } else {
                        return redirect()->route('adminLogin');
                    }
            }
        }
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the owner table
        $owner = Owner::query()
            ->where('company_name', 'LIKE', "%{$search}%")
            ->orWhere('owner_email', 'LIKE', "%{$search}%")
            ->orWhere('owner_name', 'LIKE', "%{$search}%")
            ->orWhere('desc', 'LIKE', "%{$search}%")
            ->orWhere('logo', 'LIKE', "%{$search}%")
            ->orWhere('address', 'LIKE', "%{$search}%")
            ->get();

        return view('publicSite.search', compact('owner'));
    }
}
