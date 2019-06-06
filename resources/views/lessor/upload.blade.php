@extends('layouts.app')

@section('content')

    @include('partials.navbar')

</div>
</nav>
    <section class="intro-single">
        <div class="container">

            {!! Form::model($house, [
                'method' => 'POST',
                'route'  => 'house.store',
                'files'  => TRUE,
                'id' => 'house-form'
            ]) !!}
                @include('partials.lessor.form')
                {!! Form::close() !!}

        </div>

    </section>
@endsection
