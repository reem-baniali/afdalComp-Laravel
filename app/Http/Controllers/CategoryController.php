<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Review;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $categories = Category::all();
        return view('publicSite.index', compact('categories'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {     
        $categories = Category::all();
        $singleCategories = Category::find($id);
        //  $categories ->owner;
        // redirect('companies')->back();
        return view('publicSite.singleCategory', compact('categories', 'singleCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendindex()
    {
        $categories=Category::all();
        return view('backend.manage_category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function backendcreate()
    {
        return view('backend.manage_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function backendstore(StoreCategoryRequest $request)
    {
        $this->validate($request,[
            'name'=>'required|max:250',
        
            'image'=>'required|mimes:jpeg,png,gif,jpg',
          ]);
          if($request->hasFile('image')){
              $file=$request->image;
              $new_file=time().$file->getClientOriginalName();
              $file->move('storage/category_images/',$new_file);
          }
          Category::create([
              "name"=>$request->name,
              "image"=>'storage/category_images/'.$new_file

         ]);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function backendshow(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function backendedit($id)
    {
        $category=Category::find($id);
        return view('backend.updates.category_update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function backendupdate(UpdateCategoryRequest $request,  $id)
    {
        $category=Category::find($id);
        if($request->hasFile('image')){
            $file=$request->image;
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/category_images/',$new_file);
            $category->image='storage/category_images/'.$new_file;
        }
        $category->name=$request->name;
        

        $category->update();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function backenddestroy( $request)
    {
        $category=Category::find($request);
        $category->delete(); 
        
        
        return redirect()->route('category.index');
    }
}
