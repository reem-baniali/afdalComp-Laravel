@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Users info</h5>
            <div class="card-body">
                <form action="{{route('user.update',['id'=>$user->id])}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputUserName">User Name</label>
                        <input id="inputUserName" type="text" value="{{$user->name}}" name="name" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">User Email </label>
                        <input id="inputEmail" type="email" value="{{$user->email}}" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" name="password" value="{{$user->password}}" type="password" placeholder="Password" required="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Image</label>
                        <input class="form-control  form-control-sm"  name="image" id="formFileSm" type="file">
                      </div>
                    <div class="row">
                        <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                            
                        </div>
                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary w-25">Update</button>
                                
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form -->
@endsection