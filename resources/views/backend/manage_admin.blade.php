@extends('backend.layouts.master')
@section('title','Manage Admin')
    

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Admins info</h5>
            <div class="card-body">
                <form action="{{route('admin.store')}}" method="post" >
                    @csrf

                    <div class="form-group">
                       <strong> <label for="inputUserName">Admin Name</label></strong>
                        <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Admin Email </label>
                        <input id="inputEmail" type="email" name="email" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Admin Password</label>
                        <input id="inputPassword" name="password" type="password"  required="" class="form-control">
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
                                <h5 class="card-header">Admins Table</h5>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Admin Name</th>
                                                <th scope="col">Admin Email</th>
                                                <th scope="col">Admin Password</th>
                                                <th>Edit</th>
                                                <th> Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach ($admins as $admin)
                                            <tr>
                                                <th scope="row">{{$admin->id}}</th>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->password}}</td>
                                                <td><a href="{{route('admin.edit',['id'=>$admin->id])}}"><i class="far fa-edit"></i></a></td>
                                                <td><a href="{{route('admin.destroy',['id'=>$admin->id])}}"><i class="cursor-pointer fas fa-trash text-secondary"></i></a></td>
                                               
                                               
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