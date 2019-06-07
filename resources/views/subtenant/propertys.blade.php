@extends('layouts.app')
@section('content')


  @include('partials.search')
  @include('partials.navbar')
  @include('partials.searchButton')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6">
          <div class="title-single-box">
            <h1 class="title-single">{{ $house->title }}</h1>
            <span class="color-text-a">{{ $house->location }}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-6">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{route("subtenant.allProperties")}}">Properties</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
               {{ $house->title }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  @include('partials.message')

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="{{ $house->imageUrlSlide }}" alt="">
            </div>

          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">$</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">{{ $house->price }}</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Quick Summary</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Property ID:</strong>
                      <span>{{ $house->id }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Location:</strong>
                      <span>{{ $house->location }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Property Type:</strong>
                      <span>{{ $house->type }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Status:</strong>
                      <span>{{ $house->status }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span>{{ $house->area }}
                        <sup>2</sup>
                      </span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Beds:</strong>
                      <span>{{ $house->bedroom }}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Baths:</strong>
                      <span>{{ $house->bath }}</span>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Property Description</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {!! $house->descriptionHtml !!}
                </p>
                <a href="{{route('subtenant.makeOffer', $house->id)}} " class="btn btn-success {{(Auth::guest())? "disabled" : " "}}">Make an offer</a>
              </div>


              <div class="row section-t3">
              <div class="col-sm-12">
              <div class="title-box-d">
              <h3 class="title-d">Lessor</h3>
              </div>
              </div>
              </div>
                <div class="property-agent">
                  <h4 class="title-agent">{{ $house->lessor->name }}</h4>
                  <p class="color-text-a">
                    {!! $house->lessor->bio !!}
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Phone:</strong>
                      <span class="color-text-a">{{$house->lessor->phone_number}}</span>
                    </li>

                    <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a">{{ $house->lessor->email }}</span>
                    </li>

                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
        <div class="form-comments">
          <div class="title-box-d">
            <h3 class="title-d"> Leave a Comment</h3>
          </div>
          {!! Form::open([$comment,'route' => ['comment.store', $house->id], 'method' => 'post']) !!}
        @if (\Illuminate\Support\Facades\Auth::guest())
            <div class="col-md-12 mb-3">
              <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control form-control-lg form-control-a', 'placeholder' => 'name *', 'id'=> 'inputName']) !!}
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div class="form-group">
                {!! Form::email('email', null, ['class' => 'form-control form-control-lg form-control-a', 'placeholder'=> 'email *', 'id'=> 'inputEmail1']) !!}
              </div>
            </div>
          @endif

              <div class="col-md-12 mb-3">
                <div class="form-group">
                  {!! Form::text('body', null, ['class' => 'form-control form-control-lg form-control-a', 'placeholder'=>'Comment *', 'id'=> 'body']) !!}
                </div>

              </div>
              <div class="col-md-12">
                {{--<button type="submit" class="btn btn-success">Comment</button>--}}
                {!! Form::submit('Comment', ['class' => 'btn btn-success']) !!}
              </div>

            </div>
          {!! Form::close() !!}
          <form class="form-a" method="post" action="{{ route('comment.store', $house->id) }}">

          </form>

        <div class="title-box-d">
          @if ($house->comments()->count() >= 4)
            <h3 class="title-d">Showing 4 out of {{$house->comments()->count()}}  Comments  </h3><a href="{{ route('comment.index', $house->id) }}" class="pull-right">show all</a>
          @elseif($house->comments()->count() <= 4)
              <h3 class="title-d">Showing {{ $house->comments()->count() }} Comments</h3>
          @endif
        </div>
        <div class="box-comments">
          <ul class="list-comments">
            @foreach($house->comments()->orderBy('updated_at','desc')->take(4)->get() as $comment)
            <li>

              <div class="comment-details">
                <h4 class="comment-author">{{$comment->name}}</h4>
                <span>{{ $comment->updated_at->diffForHumans() }}</span>
                <p class="comment-description">
                  =>  {{ $comment->body}}
                </p>
                <span href="3" data-toggle="tooltip" data-placement="top" title="report this user" class="fa fa-user-times pull-right"></span>


                {!! Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'delete']) !!}
                <a href="3" class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="reply"></a>
                <a href="3" data-toggle="tooltip" data-placement="top" title="report this user" class="fa fa-user-times"></a>

              @if (Auth::check() && $comment->name == Auth::user()->name)
                  <a href="3" data-toggle="tooltip" data-placement="top" title="edit" class="fa fa-edit"></a>
                  {{--{!! Form::submit( 'X',['class' => 'fa fa-trash', 'data-toggle' => 'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}--}}
                  <button onclick="return confirm('Are you sure you want to delete this comment?');" type="submit" href="3" data-toggle="tooltip" data-placement="top" title="delete" class="fa fa-trash"></button>
                @endif
                {!! Form::close() !!}


              </div>
            </li>
            @endforeach
            {{--<li class="comment-children">--}}

              {{--<div class="comment-details">--}}
                {{--<h4 class="comment-author">Oliver Colmenares</h4>--}}
                {{--<span>18 Sep 2017</span>--}}
                {{--<p class="comment-description">--}}
                  {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque--}}
                  {{--ipsam temporibus maiores--}}
                  {{--quae.--}}
                {{--</p>--}}
                {{--<a href="3">Reply</a>--}}
              {{--</div>--}}
            {{--</li>--}}

          </ul>
        </div>

      </div>

      </div>
  </section>
  <!--/ Property Single End /-->
@endsection
