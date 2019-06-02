@extends('layouts.app')

@section('content')

    <section class="intro-single">
        <div class="container">

            {!! Form::model($house, ['route' => ['house.update', $house->id], 'method' => 'put']) !!}
            @include('lessor.form')
            {!! Form::close() !!}

        </div>

    </section>
@endsection



