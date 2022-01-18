@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->


    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"> 
        <div class="card">
            <h5 class="card-header">Owners info</h5>
            <div class="card-body">
                <form action="{{route('owner.update',['id'=>$owner->id])}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group ">
                        <label for="inputUserName">Owner Name</label>
                        <input id="inputUserName" type="text" value="{{$owner->owner_name}}" name="owner_name" data-parsley-trigger="change" required="" placeholder="Owner Name" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputEmail">Owner Email </label>
                        <input id="inputEmail" type="email" name="owner_email" value="{{$owner->owner_email}}"  data-parsley-trigger="change" required="" placeholder="Owner Email" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Name</label>
                        <input id="inputUserName" type="text" name="company_name" value="{{$owner->company_name}}" data-parsley-trigger="change" required="" placeholder="Company Name" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Email</label>
                        <input id="inputUserName" type="text" name="company_email" value="{{$owner->company_email}}" data-parsley-trigger="change" required="" placeholder="Company Email" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPassword">Owner password</label>
                        <input id="inputPassword" type="password" name="password" value="{{$owner->password}}" placeholder="Owner password" required="" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company Address</label>
                        <input id="inputUserName" type="text"  name="address" value="{{$owner->address}}" data-parsley-trigger="change" required="" placeholder="Company Address" autocomplete="off" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Numbers Of Employees</label>
                        <input id="inputUserName" type="text" name="num_of_employees" value="{{$owner->num_of_employees}}" data-parsley-trigger="change" required="" placeholder="Numbers Of Employees" autocomplete="off" class="form-control">
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputUserName">Company phone</label>
                        <input id="inputUserName" type="text"  data-parsley-trigger="change" required="" placeholder="Company phone" autocomplete="off" class="form-control">
                    </div>
                </div> --}}
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
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{$owner->desc}}</textarea>
                    </div>
                </div>
                
            
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