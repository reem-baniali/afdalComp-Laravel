@extends('backend.owner_dashboard.layouts_owner.master')
@section('content')
<div class="row">

    <!-- ============================================================== -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Owner Table</h5>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Owner Email</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Email</th>
                            <th scope="col">Owner Password</th>
                            <th scope="col">Owner Phone</th>
                            <th scope="col">Company Address</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Number Of Employees</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($owners as $owner)
                        {{-- @if ( $owner->id == $singleowner->id ) --}}
                        <tr>
                            <th scope="row">{{$owner->id}}</th>
                            <td>{{$owner->owner_name}}</td>
                            <td>{{$owner->owner_email}}</td>
                            <td>{{$owner->company_name}}</td>
                            <td>{{$owner->company_email}}</td>
                            <td>{{$owner->password}}</td>
                            <td>{{$owner->phone}}</td>
                            <td>{{$owner->address}}</td>
                            <td><img src="{{asset($owner->logo)}}" width="40px" height="70px"
                                    alt="{{$owner->company_name}}"></td>
                            {{-- @foreach($categories as $category) --}}
                            <td>{{$owner->category->name}}</td>
                            {{-- @endforeach --}}
                            <td>{{$owner->desc}}</td>
                            <td>{{$owner->num_of_employees}}</td>
                            <td class="text-center">
                                <a href="{{route('owner_profile.edit',['id'=>$owner->id])}}" class="mx-3"
                                    data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>



                        </tr>
                        {{-- @endif --}}
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