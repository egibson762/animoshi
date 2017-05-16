@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Error/Success Message -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <span class="close" data-dismiss="alert">x</span>
        <strong>{{ $message }}</strong>
    </div>
        @endif
        <div class="row">

        <!-- Profile Picture -->
        <div class="col-xs-4 profile-picture">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Profile Picture</h3></div>
                <div class="panel-body">
                    <div style="text-align: center;">
                    <img style="max-width:100%;max-height:100%;" src="{{ asset('storage/app/images/') }}/{{ $profile->profilepic }}">
                    </div>
                    <div class="divider">

                    </div>
                    <h4>Add or Edit Profile Picture</h4>

                    <form action="{{ url('profile/uploadpicture') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="btn btn-primary">
                            <input type="file" name="fileToUpload" id="fileToUpload" />
                            Choose File...
                        </label>
                        <input id="file-upload" type="file"/>
                        <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">

                        <a href="{{ url('profile/deletepicture') }}" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                    </form>
                </div>

            </div>
        </div>

        <!-- Main Profile Content -->
        <div class="col-xs-8 profile">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Username: {{ $user->name }}</h3></div>

                <div class="panel-body">
                    <div class="user-information">
                        <h4>First Name: {{ $profile->firstname }}</h4>
                        <h4>Last Name: {{ $profile->lastname }}</h4>
                        <h4>Age: {{ $profile->age }}</h4>
                        <h4>Location: {{ $profile->location }}</h4>
                    </div>
                    <button class="btn btn-primary" id="edit-profile-btn">Edit Profile</button>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h3>Anime RP Zone</h3></div>

                <div class="panel-body">
                    <div class="user-information">
                        <h4>{{ $profile->description }}</h4>
                        <h4></h4>
                        <h4></h4>
                        <h4></h4>
                    </div>
                </div>
            </div>

            <!-- Hidden Profile Edit Form -->
            <div style="display:none;" id="edit-profile" class="panel panel-default">
                <div class="panel-heading"><h3>Edit Profile</h3></div>
                <div class="panel-body">
                <form action="{{ url('profile/editprofile') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="mid">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $profile->firstname }}">
                    </div>
                    <div class="form-group">
                        <label for="mid">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $profile->lastname }}">
                    </div>
                    <div class="form-group">
                        <label for="mid">Age:</label>
                        <input type="text" class="form-control" id="age" name="age" value="{{ $profile->age }}">
                    </div>
                    <div class="form-group">
                        <label for="pp">Location:</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $profile->location }}">
                    </div>

                    <input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit"/>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $("#edit-profile-btn").click(function () {
            $("#edit-profile").slideToggle("slow");
        });
    });
</script>

@endsection
