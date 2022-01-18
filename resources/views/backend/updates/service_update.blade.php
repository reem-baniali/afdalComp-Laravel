@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Service Edit</h5>
            <div class="card-body">
                <form action="{{route('service.update',['id'=>$service->id])}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inputUserName">service Name</label>
                        <input id="inputUserName" type="text" name="title" value="{{$service->title}}"   data-parsley-trigger="change" required="" placeholder="Category Name" autocomplete="off" class="form-control">
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
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3">{{$service->desc}}</textarea>
                      </div>
                  </div>
                 
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Image</label>
                        <input class="form-control  form-control-sm" name="service_image" id="formFileSm" type="file">
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
   