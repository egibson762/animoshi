@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>My Messages</h3></div>
                <h1 style="margin-left:20px;">{{ $thread->subject }}</h1>
                @each('messenger.partials.messages', $thread->messages, 'message')
                <div class="panel panel-default">
                    <div class="row" style="margin-left:20px;margin-right:20px;">
                @include('messenger.partials.form-message')
                        </div>
                </div>
                @stop
            </div>
        </div>
    </div>
</div>