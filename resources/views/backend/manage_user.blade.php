@extends('backend.layouts.master')
@section('title','Manage Users')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Users info</h5>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputUserName">User Name</label>
                        <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">User Email </label>
                        <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" name="password" type="password"  required="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Image</label>
                        <input class="form-control  form-control-sm" name="image" id="formFileSm" type="file">
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
                                <h5 class="card-header">Users Table</h5>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-responsive p-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">User Email</th>
                                                <th scope="col">User Password</th>
                                                <th scope="col">User image</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{$user->id}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->password}}</td>
                                                <td><img src="{{asset($user->image)}}" width="70px" height="70px" alt="{{$user->name}}"></td>
                                                <td><a href="{{route('user.edit',['id'=>$user->id])}}"><i class="far fa-edit"></i></a></td>
                                                <td><a href="{{route('user.destroy',['id'=>$user->id])}}"><i class="cursor-pointer fas fa-trash text-secondary"></i></a></td>
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