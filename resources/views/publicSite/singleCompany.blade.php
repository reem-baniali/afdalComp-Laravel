@extends('publicSite.layout.master')

@section('title','Companies')
@section('content')

{{-- internal css style part --}}
<style>
  .page_link>a:hover {
    font-weight: 900;
  }

  body {
    overflow-x: hidden
  }

  .container-fluid {
    background-image: linear-gradient(to right, #7B1FA2, #E91E63)
  }

  .sm-text {
    font-size: 10px;
    letter-spacing: 1px
  }

  .sm-text-1 {
    font-size: 14px
  }

  .green-tab {
    background-color: #00C853;
    color: #fff;
    border-radius: 5px;
    padding: 5px 3px 5px 3px
  }

  .btn-red {
    background-color: #E64A19;
    color: #fff;
    border-radius: 20px;
    border: none;
    outline: none
  }

  .btn-red:hover {
    background-color: #BF360C
  }

  .btn-red:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
  }

  .round-icon {
    font-size: 40px;
    padding-bottom: 10px
  }

  .fa-circle {
    font-size: 10px;
    color: #EEEEEF
  }

  .green-dot {
    color: #4CAF50
  }

  .red-dot {
    color: #E64A19
  }

  .yellow-dot {
    color: #FFD54F
  }

  .grey-text {
    color: #BDBDBD
  }

  .green-text {
    color: #4CAF50
  }

  .block {
    border-right: 1px solid #F5EEEE;
    border-top: 1px solid #F5EEEE;
    border-bottom: 1px solid #F5EEEE
  }

  .profile-pic img {
    border-radius: 50%
  }

  .rating-dot {
    letter-spacing: 5px
  }

  .via {
    border-radius: 20px;
    height: 28px
  }

  /* Rate design */
  .rate-container {
    /* position: absolute;
    
    top: 30%;
    left: 50%; */
    margin-left: -80px;
    margin-top: 16px;
    transform: translate(-50%, -50%) rotateY(180deg);
    display: flex;
  }

  .rate-container input {
    display: none;
  }

  .rate-container label {
    display: block;
    cursor: pointer;
    width: 30px;
  }

  .rate-container label:before {
    content: '\f005';
    font-family: fontAwesome;
    / position: relative;
    */ display: block;
    font-size: 30px;
    color: #101010;
  }

  .rate-container label:after {
    content: '\f005';
    font-family: fontAwesome;
    position: absolute;
    display: block;
    font-size: 30px;
    color: #2E86C1;
    top: 0;
    opacity: 0;
    transition: .5s;
    text-shadow: 0 2px 5px rgba(0, 0, 0, .5);
  }

  .rate-container label:hover:after,
  .rate-container label:hover~label:after,
  .rate-container input:checked~label:after {
    opacity: 1;
  }

  @media(max-width: 502px) {
    .rate-container label {
      width: 80px;
    }

    .rate-container label:before {
      font-size: 80px;
    }

    .rate-container label:after {
      font-size: 80px;
    }
  }

  @media(max-width: 407px) {
    .rate-container label {
      width: 50px;
    }

    .rate-container label:before {
      font-size: 50px;
    }

    .rate-container label:after {
      font-size: 50px;
    }

  }
  }
</style>

{{-- Company name and desc + breedcrumbs section --}}
<section class="ftco-section bg-light">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="page_link mb-sm-5 mb-md-5">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('allCategories') }}">/ Companies</a>
        <a href={{ route('company',$singleOwners->id) }}>
          / {{ $singleOwners->company_name }}</a>
      </div>
      <div class="row">
        <div class="col-5">
          <img width="90%" height="400px" src="{{asset($singleOwners->logo)}}" class="" alt="Company-logo">
        </div>
        <div class="col-7">
          <div class="row  ">
            <form action="{{ route('comment.store') }}" method="post" class=" ">
              @csrf
              <div class="row justify-content-start">
                <div class="col-10">
                  <div class="form-group">
                    <label for=" Email1msg">Write your review:</label>
                    <textarea style="position:relative; width:450px;" class="form-control bg-light p-3 pt-5 rounded"
                      name="comment" rows="6" placeholder="Review Us!"></textarea>
                  </div>
                </div>
                <div class="col-8 " style="position:absolute; top:50px; ">
                  <div class="d-flex " style="justify-content:flex-end; margin-right: 145px;">
                  
                    <div class="rate-container ">
                      <input type="radio" name="like" id="star1" value="5"><label for="star1"></label>
                      <input type="radio" name="like" id="star2" value="4"><label for="star2"></label>
                      <input type="radio" name="like" id="star3" value="3"><label for="star3"></label>
                      <input type="radio" name="like" id="star4" value="2"><label for="star4"></label>
                      <input type="radio" name="like" id="star5" value="1"><label for="star5"></label>
                    </div>
                    <div class="" style="margin-left:-70px"><label for=" Email1msg">Select Rating</label></div>
                  </div>
                </div>
                <div class="col-8 ">
                  @if(!empty(Auth::user()))

                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="hidden" name="owner_id" value="{{ $singleOwners->id }}">
                  <button type="submit" class="btn btn-primary ml-5">Add Review</button>
                  @else
                  <a class="btn btn-primary " href="{{ route('login') }}">Add Review</a>
                  @endif
                </div>
              </div>
              </fieldset>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>


  <div class="container">
    <div class="row w-100 justify-content-start">
      <div class="col-5 d-flex justify-content-start mt-2 mb-5 ms-3">
        <div class="banner_content d-md-flex justify-content-between align-items-center">
          <div class="mb-sm-5 mb-md-5">
            <h2>{{ $singleOwners->company_name }} Company</h2>
            <p class="text-break">{{ $singleOwners->desc}}</p>
            <p><strong>Company rate:{{" ".$avg_rate." out of 5" }}</strong></p>
            <p><strong>Total Reviews: {{" ".$rate_num }}</strong></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Show Services
            </button>
          </div>

        </div>

        {{-- End Form --}}
      </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Latest Reviews</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @foreach ($services as $service)
              @if($service->owner_id === $singleOwners->id)
              <div class="p-3 mb-2" style="border-bottom: 1px solid gray; ">
                <h4 class=""><strong>{{ $service->title}}</strong></h4>
                <img src="{{ asset($service->service_image) }}" alt="service_image" width="100%" srcset="">
                <p class="text-break">{{ $service->desc}}</p>
              </div>
              @endif
              @endforeach


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



      <div class="col-12 mt-5 p-5 " style="height: 700px" >
        @foreach ($comments as $comment)
        @if($comment->owner_id === $singleOwners->id)
        <div class="item mb-5">
          <div class="testimony-wrap d-flex">
            <div class="user-img" style="background-image: url({{ asset($comment->user->image) }})">
            </div>
            <div class="text pl-4 ">
              <span class="quote d-flex align-items-center justify-content-center">
                <i class="icon-quote-left"></i>
              </span>
              <h4 class=""><strong>{{ $comment->user->name}}</strong></h4>
              <p class="text-break">{{ $comment->comment}}</p>
              <h6> <strong> Ratted {{ $comment->like}} out of 5</strong></h6>
              <span class="float-right"> {{ $comment->created_at}} </span>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        {{-- pagination part --}}
        <div style="justify-content: center; margin-left:50%;margin-top:5%;margin-bottom:2%">
          {!! $comments->links() !!}
        </div>
        {{-- end pagination part --}}
      </div>

    </div>
  </div>



</section>

@endsection