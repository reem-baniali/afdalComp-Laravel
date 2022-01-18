@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- ============================================================== -->
    <!-- basic form -->
    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Image Edit</h5>
            <div class="card-body">
                <form action="{{route('image.update',['id'=>$image->id])}}" method="post" id="basicform" data-parsley-validate="" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Choose Image</label>
                        <input class="form-control  form-control-sm" name="image" id="formFileSm" type="file">
                      </div>
                      <div class="form-group">
                        <label for="inputUserName">Image Alt</label>
                        <input id="inputUserName" type="text" value="{{$image->image_alt}}" name="image_alt" data-parsley-trigger="change" required="" placeholder="Service Name" autocomplete="off" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group w-100">
                            <label for="inputState">Owner</label>
                            <select value="" name="owner" id="inputState" class="form-control">
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