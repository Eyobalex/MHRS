<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/4/2019
 * Time: 2:51 PM
 */
?>
<div class="form-group description">
{!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
@if($errors->has('description'))
    <span class="help-block alert-danger">{{ $errors->first('description') }}</span>
@endif
<br>
{!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group description">
    {!! Form::label('description') !!}
    @if($errors->has('description'))
        <span class="help-block alert-danger">{{ $errors->first('description') }}</span>
    @endif
    <br>

    {!! Form::textarea('description_offer', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group ">
    {!! Form::submit('Make an offer', ['class' => 'form-control btn btn-success']) !!}
</div>