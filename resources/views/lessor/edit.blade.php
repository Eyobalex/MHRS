@extends('layouts.app')

@section('content')
    @include('partials.navbar')

</div>
</nav>
    <section class="intro-single">
        <div class="container">

            {!! Form::model($house, ['route' => ['house.update', $house->id], 'method' => 'put']) !!}
            @include('partials.lessor.form')
            {!! Form::close() !!}

        </div>

    </section>
@endsection



