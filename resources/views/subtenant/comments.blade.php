<?php
/**
 * Created by PhpStorm.
 * User: Eyob
 * Date: 6/7/2019
 * Time: 12:56 PM
 */?>

@extends('layouts.app')
@section('content')
    @include('partials.search')
    @include('partials.navbar')
    @include('partials.searchButton')
    <div class="intro-single">
        <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="title-box-d">
                    <h3 class="title-d"> Comments({{ $comments->count() }})</h3> <a href="{{ route('subtenant.show', $house->id) }}" class="pull-right">&laquo; back</a>
            </div>
            <div class="box-comments">
                <ul class="list-comments">
                    @foreach($comments as $comment)
                        <li>

                            <div class="comment-details">
                                <h4 class="comment-author">{{$comment->name}}</h4>
                                <span>{{ $comment->updated_at->diffForHumans() }}</span>
                                <p class="comment-description">
                                    =>  {{ $comment->body}}
                                </p>
                                {!! Form::open(['route' => ['comment.destroy', $comment->id], 'method' => 'delete']) !!}
                                <a href="3" class="fa fa-reply" data-toggle="tooltip" data-placement="top" title="reply"></a>
                                <a href="3" data-toggle="tooltip" data-placement="top" title="report this user" class="fa fa-user-times"></a>

                                @if (Auth::check() && $comment->name == Auth::user()->name)
                                    <a href="3" data-toggle="tooltip" data-placement="top" title="edit" class="fa fa-edit"></a>
                                    {{--{!! Form::submit( 'X',['class' => 'fa fa-trash', 'data-toggle' => 'tooltip', 'data-placement'=>'top', 'title'=>'Delete']) !!}--}}
                                    <button onclick="return confirm('Are you sure you want to delete this comment?');" type="submit" href="3" data-toggle="tooltip" data-placement="top" title="delete" class="fa fa-trash"></button>
                                @endif
                                {!! Form::close() !!}
                            </div>
                        </li>

                    <li class="comment-children">

                    <div class="comment-details">
                    <h4 class="comment-author">Oliver Colmenares</h4>
                    <span>18 Sep 2017</span>
                    <p class="comment-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                    ipsam temporibus maiores
                    quae.
                    </p>
                    <a href="3">Reply</a>
                    </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>





    </div>
@stop