<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/2/2019
 * Time: 10:08 PM
 */?>

<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <td width="150">Action</td>
        <td width="50">Title</td>
        <td width="50">Price</td>
        <td width="50">Location</td>
        <td width="50">Status</td>
        <td width="50">Type</td>
        <td width="50">Bath</td>
        <td width="50">Bedroom</td>
        <td width="50">Area</td>
        <td width="50">Views</td>
        <td width="50">offers</td>
        {{--<td width="170">Date</td>--}}
    </tr>
    </thead>
    <tbody>
    @foreach($houses as $house)
        <tr>
            <td>
                {!! Form::open([ 'method' => 'delete', 'route' =>['house.destroy', $house->id]]) !!}
                <a href="{{ route('lessor.offers', $house->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-envelope"></i>
                </a>
                <a href="{{ route('house.edit', $house->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="submit">
                    <i class="fa fa-trash"></i>
                </button>

                {!! Form::close() !!}
            </td>
            <td>{{ $house->title }}</td>
            <td>${{ $house->price }}</td>
            <td>{{ $house->location }}</td>
            <td>{{ $house->status }}</td>
            <td>{{ $house->type }}</td>
            <td>{{ $house->bath }}</td>
            <td>{{ $house->bedroom }}</td>
            <td>{{ $house->area }}</td>
            <td>{{ $house->views }}</td>
            {{--<td>0</td>--}}
            <td>{{ $house->offers()->count()}}</td>

        </tr>

    @endforeach
    </tbody>


</table>

