<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/4/2019
 * Time: 10:52 AM
 */?>

<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="{{route('home')}}"> MH<span class="color-b">RS</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">

                    @if (Auth::check() && Auth::user()->hasRole('lessor'))
                        <a class="nav-link" href="{{ route('house.index') }}">Home</a>
                    @elseif(Auth::check() && Auth::user()->hasRole('subtenant'))
                        <a class="nav-link " href="{{ route('home') }}">Home</a>
                    @else
                        <a class="nav-link " href="{{ route('home') }}">Home</a>
                    @endif

                </li>
                @if (Auth::check() && Auth::user()->hasRole('lessor'))
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('house.create') }}">Upload House</a>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link  " href="{{ route('lessor.myOffers') }}">My offers</a>--}}
                    {{--</li>--}}
                @elseif(Auth::check() && Auth::user()->hasRole('subtenant'))
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('subtenant.allProperties') }}">Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="{{ route('subtenant.offers') }}">My offers</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @auth
                            <a class="dropdown-item" href="property-single.html">Edit</a>
                            {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
                            {!! Form::submit('Logout', ['class' => 'dropdown-item']) !!}
                            {!! Form::close() !!}
                        @endauth
                        @guest
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>



