@extends('publicSite.layout.master')

{{-- @section('title','Companies')  --}}
@section('content')
<style>
  .page_link>a:hover{
    font-weight:900;
  }
</style>



<section class="ftco-section bg-light">
  <div class="container">
    {{-- title dive --}}
      <div class="row justify-content-center mb-5 pb-2">
<div class="col-md-8  heading-section ftco-animate">
  <h4 class="mb-2"><strong>{{ $singleCategories->name }}</strong> <span>Companies</span></h4>
  {{-- <p>Separated they live in. A small river named Duden flows 
    by their place and supplies it with the necessary regelialia. 
    It is a paradisematic country</p> --}}
    <div class="page_link">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('allCategories') }}">/ Companies</a>
  
      <a href={{ route('category',$singleCategories->id) }}>/ {{ $singleCategories->name }}</a>
    
    </div>
</div>
</div>
      <div class="row">

{{-- start aside div - top categories --}}
<div class="col-lg-2" style="border-right: solid 2px grey">
  <div class="left_sidebar_area">
    <aside class="left_widgets p_filter_widgets" >
      <div  >
        <h5 class=""><strong>Top Categories</strong></h5>
      </div>
      <div class="widgets_inner">
        <ul class="list">
          @foreach ($categories as $category)
            <li class="category-title">
               <a href="{{ route('category',$category->id )}}">
                {{ $category->name }}</a>
            </li>
            @endforeach
        </ul>
      </div>
    </aside>
  </div>
</div>
{{-- End aside div --}}

{{-- main content --}}
<div class="col-10 d-flex justify-content-center gap-5">
  @foreach ($singleCategories->owner as $owner)
  <div class="col-4" style="max-width: fit-content; overflow:hidden">
  <div class="card" style="width: 18rem; ">
    <img height="250px" src="{{ asset($owner->logo) }}" class="card-img-top" alt="Company-logo">
    <div class="card-body">
      <h5 class="card-title">{{ $owner->company_name }}</h5>
      <p class="card-text text-truncate">{{ $owner->desc }}</p>
      <a href="{{ route('company',$owner->id) }}" class="btn btn-primary">Discover Now </a>
    </div>
  </div>
</div>
@endforeach
</div>
</div>
{{-- end main content --}}

</div>
</div>

</section>


@endsection











