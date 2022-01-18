@extends('backend.layouts.master')
@section('title','Manage Image')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Images Info</h5>
            <div class="card-body">
                <form action="{{route('image.store')}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Image</label>
                        <input class="form-control  form-control-sm" name="image" id="formFileSm" type="file">
                      </div>
                    <div class="form-group">
                        <label for="inputUserName">Image Alt</label>
                        <input id="inputUserName" type="text" name="image_alt" data-parsley-trigger="change"  autocomplete="off" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group w-100">
                            <label for="inputState">Owner</label>
                            <select name="owner" id="inputState" class="form-control">
                              <option selected>Choose Owner</option>
                             
                              
                              @foreach($owners as $owner)
                              <option value="{{$owner->id}}">{{$owner->owner_name}}</option>
                              @endforeach
                            </select>
                            
                          </div>
                         
                  </div>
                  
                 
                    
                    <div class="row">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                            
                        </div>
                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary w-25">Add</button>
                                
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form -->

    <!-- striped table -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Images Table</h5>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Image Alt</th>
                                                <th scope="col">Owner Name</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($images as $image)
                                            <tr>
                                                <th scope="row">{{$image->id}}</th>
                                                <td><img src="{{asset($image->image)}}" width="70px" height="70px" alt="{{$image->image_alt}}"></td>
                                                <td>{{$image->image_alt}}</td>
                                                
                                                <td>{{$image->owner->owner_name}}</td>
                                                
                                                <td><a href="{{route('image.edit',['id'=>$image->id])}}" ><i class="far fa-edit"></i></a></td>
                                                <td><a href="{{route('image.destroy',['id'=>$image->id])}}"><i class="cursor-pointer fas fa-trash text-secondary"></i></a></td>
                                                
                                            </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end striped table -->
                        <!-- ============================================================== -->
                    </div>
@endsection