@extends('publicSite.layout.master')

@section('title','Companies')
@section('content')

<style>
  .page_link>a:hover {
    font-weight: 900;
  }
</style>


<section class="ftco-section bg-light">
  <div class="container">
    {{-- title dive --}}
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8  heading-section ftco-animate">
        <h3 class="mb-2"><span>All</span> Companies</h3>
        {{--<p>Separated they live in. A small river named Duden flows by their place
          and supplies it with the necessary regelialia. It is a paradisematic country</p> --}}
        <div class="page_link">
          <a href="/">Home</a>
          <a href="{{ route('allCategories') }}">/ Companies</a>
        </div>
      </div>

    </div>
    <div class="row">

      {{-- start aside div - top categories --}}
      <div class="col-lg-2" style="border-right: solid .5px rgb(194, 194, 194)">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div>
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
      <div class="col-10 d-flex justify-content-center flex-wrap gap-5 m-auto">
        @foreach ($owners as $owner)
        <div class="col-md-4 col-sm-8 mb-2 " style="max-width: fit-content; overflow:hidden">
          <div class="card" style="width: 18rem; ">
            <img height="250px" src="{{asset($owner->logo)}}" class="card-img-top" alt="Company-logo">
            <div class="card-body">
              <h5 class="card-title">{{ $owner->company_name }}</h5>
              <p class="card-text text-truncate">{{ $owner->desc }}</p>
              <a href="{{ route('company', $owner->id ) }}" class="btn btn-primary">Discover Now </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{-- end main content --}}
    {{-- pagination part --}}
    <div style="justify-content: center; margin-left:50%;margin-top:5%;margin-bottom:2%">
      {!! $owners->links() !!}
    </div>
    {{-- end pagination part --}}
  </div>
  </div>

</section>

@endsection