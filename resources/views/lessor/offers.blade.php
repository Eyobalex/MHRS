<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/6/2019
 * Time: 3:23 PM
 */?>


@extends('layouts.app')

@section('content')
    @include('partials.search')
    @include('partials.navbar')
    @include('partials.searchButton')
    <section class="intro-single">
        <div class="container">
            @include('partials.message')
            <div class="row">

                <div class="col-md-12 col-lg-12">

                    @if(! $offers->count())
                        <div class="alert alert-danger">
                            <strong>No Record Found</strong>
                        </div>
                    @else


                        <table class="table table-bordered table-responsive">
                            <thead>
                            <tr>
                                <td width="150">Action</td>
                                <td width="350">subtenant</td>
                                <td width="350">House</td>
                                <td width="350">Price</td>
                                <td width="350">description</td>
                                <td width="350">Status</td>

                                {{--<td width="170">Date</td>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>
                                        {!! Form::open([ 'method' => 'patch', 'route' =>['lessor.acceptOffer', $offer->id]]) !!}
                                            <button  type="submit" data-toggle="tooltip" data-placement="top" title="Accept Offer">
                                                <i class="fa fa-check-square"></i>
                                            </button>
                                        {!! Form::close() !!}

                                        {!! Form::open([ 'method' => 'patch', 'route' =>['lessor.rejectOffer', $offer->id]]) !!}
                                            <button type="submit" data-toggle="tooltip" data-placement="top" title="Reject Offer">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{ $offer->subtenant->name }}</td>
                                    <td>{{ $offer->house->title }}</td>
                                    <td>{{ $offer->price }}</td>
                                    <td>{{ $offer->description_offer }}</td>
                                    <td>{{ $offer->status }}</td>

                                </tr>

                            @endforeach
                            </tbody>


                        </table>



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

