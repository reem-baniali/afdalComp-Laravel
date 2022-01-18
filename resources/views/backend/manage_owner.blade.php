@extends('backend.layouts.master')
@section('title','Manage Owner')
@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
        <div class="card">
            <h5 class="card-header">Owners info</h5>
            <div class="card-body">
                <form action="{{route('owner.store')}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group ">
                        <label for="inputUserName">Owner Name</label>
                        <input id="inputUserName" type="text" name="owner_name" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail">Owner Email </label>
                        <input id="inputEmail" type="email" name="owner_email" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Name</label>
                        <input id="inputUserName" type="text" name="company_name" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Email</label>
                        <input id="inputUserName" type="text" name="company_email" data-parsley-trigger="change" required="" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPassword">Owner password</label>
                        <input id="inputPassword" type="password" name="password"  required="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Address</label>
                        <input id="inputUserName" type="text"  name="address" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Numbers Of Employees</label>
                        <input id="inputUserName" type="text" name="num_of_employees" data-parsley-trigger="change" required=""  autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Logo</label>
                        <input class="form-control form-control-sm" name="logo" id="formFileSm" type="file">
                      </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group w-100">
                        <label for="inputState">Category</label>
                        <select name="category" id="inputState" class="form-control">
                          <option selected>Choose Category</option>
                         
                          
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                        
                      </div>
                     
              </div>
              
                    
                <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
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
                                <h5 class="card-header">Owners Table</h5>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped scroll-auto ">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Owner Name</th>
                                                <th scope="col">Owner Email</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Company Email</th>
                                                <th scope="col">Owner Password</th>
                                               
                                                <th scope="col">Company Address</th>
                                                <th scope="col">Logo</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Number Of Employees</th>
                                                <th>Edit</th>
                                                <th> Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($owners as $owner)
                                           
                                            <tr>
                                                <th scope="row">{{$owner->id}}</th>
                                                <td>{{$owner->owner_name}}</td>
                                                <td>{{$owner->owner_email}}</td>
                                                <td>{{$owner->company_name}}</td>
                                                <td>{{$owner->company_email}}</td>
                                                <td class="text-truncate">{{$owner->password}}</td>
                                                
                                                <td>{{$owner->address}}</td>
                                                <td><img src="{{asset($owner->logo)}}" width="40px" height="70px" alt="{{$owner->company_name}}"></td>
                                                {{-- @foreach($categories as $category) --}}
                                                <td>{{$owner->category->name}}</td>
                                               {{-- @endforeach --}}
                                                <td>{{$owner->desc}}</td>
                                                <td>{{$owner->num_of_employees}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('owner.edit',['id'=>$owner->id])}}" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit user">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{route('owner.destroy',['id'=>$owner->id])}}" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit user">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                                </a>
                                                </td>
                                                    
    
                                               
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