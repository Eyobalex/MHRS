
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@foreach($houses as $house)

    <p> {{ $house->photo() }}</p>

    @endforeach
 {{--{!! Form::model( ['route' => 'house.store', 'method' => 'post', 'files' => true]) !!}--}}
{{--{!! Form::text('title', null, ['class' => 'form-control']) !!}--}}
{{--{!! Form::text('slug', null, ['class' => 'form-control']) !!}--}}
{{--{!! Form::text('price', null, ['class' => 'form-control']) !!}--}}
{{--{!! Form::text('description', null, ['class' => 'form-control']) !!}--}}
{{--{!! Form::text('location', null, ['class' => 'form-control']) !!}--}}
{{--{!! Form::text('lessor_id', null, ['class' => 'form-control']) !!}--}}
 {{--{!! Form::file('image', ['class' => 'form-control']) !!}--}}
 {{----}}
 {{--{!! Form::submit('Submit', ['class' => 'form-control']) !!}--}}

 {{--{!! Form::close() !!}--}}

 {{--<br>--}}
{{--{!! Form::open(['route' => 'logout', 'method' => 'post']) !!}--}}
	{{--{!! Form::submit('Logout', ['class' => 'form-control']) !!}--}}
{{--{!! Form::close() !!}--}}

</body>
</html>