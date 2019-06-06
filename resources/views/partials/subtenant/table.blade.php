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
        <td width="350">Lessor</td>
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
                {!! Form::open([ 'method' => 'delete', 'route' =>['subtenant.deleteOffer', $offer->id]]) !!}
                <a href="{{ route('subtenant.editOffer', $offer->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                <button type="submit">
                    <i class="fa fa-trash"></i>
                </button>

                {!! Form::close() !!}
            </td>
            <td>{{ $offer->lessor->name }}</td>
            <td>{{ $offer->house->title }}</td>
            <td>{{ $offer->price }}</td>
            <td>{{ $offer->description_offer }}</td>
            <td>{{ $offer->status }}</td>

        </tr>

    @endforeach
    </tbody>


</table>

