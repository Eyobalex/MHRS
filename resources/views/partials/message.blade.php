<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/2/2019
 * Time: 10:13 PM
 */?>

@if(session('message'))
    <div class="alert alert-success col-md-12">
        {{session('message')}}
    </div>

@elseif(session('error-message'))
    <div class="alert alert-danger col-md-12">
        {{ session('error-message') }}
    </div>
@endif
