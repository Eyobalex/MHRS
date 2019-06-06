<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/4/2019
 * Time: 3:08 PM
 */?>

@extends('layouts.app')

@section('content')
    @include('partials.search')
    @include('partials.navbar')
    @include('partials.searchButton')
    <section class="intro-single">
        <div class="container">
            <div class="row">

                @include('partials.message')
                <div class="col-md-12 col-lg-12">

                    @if(! $offers->count())
                        <div class="alert alert-danger">
                            <strong>No Record Found</strong>
                        </div>
                    @else

                        @include('partials.subtenant.table')

                    @endif

                    <div class="row">
                        <div class="col-sm-12" style="margin-bottom: 250px">
                            <nav class="pagination-a">
                                {{--{{ $offers->links() }}--}}
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop
