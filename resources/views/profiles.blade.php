@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Profile Picture -->
        <div class="col-xs-4 profile-picture">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile Picture</h3></div>
                <div class="panel-body">
                    <div style="text-align: center;">
                    <img style="max-width:100%;max-height:100%;margin:auto;" src="{{ asset('storage/app/images/') }}/{{ $profile->profilepic }}">
                    </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- Main Profile Content -->
        <div class="col-xs-8 profile">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Username: {{ $profileUser->name }}</h3></div>

                <div class="panel-body">
                    <div class="user-information">
                        <h4>First Name: {{ $profile->firstname }}</h4>
                        <h4>Last Name: {{ $profile->lastname }}</h4>
                        <h4>Age: {{ $profile->age }}</h4>
                        <h4>Location: {{ $profile->location }}</h4>
                    </div>

                </div>
            </div>
    </div>
</div>

@endsection
