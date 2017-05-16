@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile Search</h3></div>
                @foreach ($users as $u)
                <div class="panel-body">
                    <h4 style="margin-right:30px;"><a href="/profiles/{{ $u->id }}"><img
                                style="max-width:100px;max-height:100px;"
                         src="{{ asset('storage/app/images/') }}/{{ $u->profilepic }}"></a>
                    <a href="/profiles/{{ $u->id }}">{{ $u->name }}</a></h4>
                </div>
                <div class="divider"></div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Trending</h3></div>

                <div class="panel-body">
                    No anime here :c
                </div>
            </div>
        </div>
    </div>
</div>

@endsection