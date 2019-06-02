@extends('layouts.app')

@section('content')

    <section class="intro-single">
        <div class="container">

            {!! Form::model($house, [
                'method' => 'POST',
                'route'  => 'house.store',
                'files'  => TRUE,
                'id' => 'house-form'
            ]) !!}
                @include('lessor.form')
                {!! Form::close() !!}

        </div>

    </section>
@endsection
