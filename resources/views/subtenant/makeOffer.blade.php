<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/4/2019
 * Time: 2:03 PM
 */?>

@extends('layouts.app')

@section('content')
@include('partials.navbar')
    </div>
</nav>
<section class="intro-single">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Make an offer') }}</div>

                    <div class="card-body">


                            {!! Form::model($house,['route' => ['subtenant.storeOffer', $house->id], 'method' => 'post']) !!}


                            @csrf

                      @include('partials.subtenant.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@stop
