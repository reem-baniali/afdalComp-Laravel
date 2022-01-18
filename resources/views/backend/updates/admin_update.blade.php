@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Admins info</h5>
            <div class="card-body">
                <form action="{{route('admin.update',['id'=>$admin->id])}}" method="post" >
                    @csrf

                    <div class="form-group">
                       <strong> <label for="inputUserName">Admin Name</label></strong>
                        <input id="inputUserName" type="text" name="name" value="{{$admin->name}}" data-parsley-trigger="change" required="" placeholder="Admin Name" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Admin Email </label>
                        <input id="inputEmail" type="email" name="email" value="{{$admin->email}}" data-parsley-trigger="change" required="" placeholder="Admin Email" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Admin Password</label>
                        <input id="inputPassword" name="password" type="password" value="{{$admin->password}}" placeholder="Admin Password" required="" class="form-control">
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