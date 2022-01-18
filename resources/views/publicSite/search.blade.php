@extends('publicSite.layout.master')

 @section('title','Companies') 
 @section('content')
 <style>
    .page_link>a:hover{
      color:#fbf88e;
    }
    .search-card{
     margin-left: 20px;
     margin-bottom: 20px;
    }
  </style>

 <section class="ftco-section bg-light">

      {{-- title dive --}}
        <div class="row justify-content-center mb-5 pb-2">

  <div class="col-md-8 text-center heading-section ftco-animate">
    <h2 class="mb-4"><span>All</span> Companies</h2>
    <p>Separated they live in. A small river named Duden flows by their place 
      and supplies it with the necessary regelialia. It is a paradisematic country</p>
      <div class="page_link">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('allCategories') }}">/ Companies</a>
      </div>
  </div>
  </div>



  <div class="search-container   ">
      <div class="row d-flex justify-content-center " >
        <div class="col-8 d-flex justify-content-center flex-wrap " >
 @isset($owner)

@if($owner->isNotEmpty())
    @foreach ($owner as $item)
    <div class=" card search-card" style="width:18rem;" >
                <img height="250px" src="{{ asset($item->logo) }}" class="card-img-top" alt="company-logo">
                <div class="card-body">
                  <h5 class="card-title"><strong>{{ $item->company_name }}</strong></h5>
                  <h6>Ownered by: {{ $item->owner_name }}</h6>
                  <h6>Owner Email: {{ $item->owner_email }}</h6>
                  <h6 class="mb-4">Address: {{ $item->address}}</h6>
                  <a href="{{ route('company',$item->id ) }}" class="btn btn-primary">Discover Now</a>
                </div>
            </div>
    @endforeach
</div>
</div>


@else 
    <div>

        <h2>No Result!</h2>
    </div>
@endif
@endisset
</div>
</section>
 @endsection