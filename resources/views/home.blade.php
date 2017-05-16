@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-warning">
        <span class="close" data-dismiss="alert">x</span>
        <strong>Warning!</strong> ANIMOSHI.COM is under construction and is pre-alpha! Contact a sysadmin if you
        encounter any problems!
    </div>

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
        <div class="col-xs-3 overview">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Overview</h3></div>

                <div class="panel-body">
                    <div class="search-profiles" id="search-profiles">
                    Search Profiles<span style="top:3px;" class="glyphicon glyphicon-search pull-right"></span>
                    </div>

                    <div class="divider" style="display:none;" id="divider-hidden"></div>

                    <div id="search-form" style="display:none;">
                        <form action="{{ url('profiles/searchprofiles') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Search" id="submit"/>
                                <input class="btn btn-primary" type="submit" name="submit" value="See All" id="submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="divider"></div>
                    <div class="search-profiles" id="search-profiles">
                        <a href="/rules">
                            Rules
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 postview">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h3>New Post</h3>
                    <div class="divider">

                    </div>
                    <form action="{{ url('posts/newpost') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea class="style-text" id="newpost"
                                      name="content" rows=3 cols=30 wrap="hard" placeholder="Tell us more about Anime!"></textarea>
                        </div>
                        <div class="divider">
                        </div>
                        <div class="form-group" style="display: none;" id="newpost-submit">
                            <input class="btn btn-primary" type="submit" name="submit" value="New Post" id="submit"/>
                            <img id="add-photo" style="width:30px;height:30px;cursor:pointer;" src="{{ asset('storage/app/images/camera.ico') }}">
                        </div>
                        <div class="form-group" style="display:none;" id="addphoto-button">
                            <label class="btn btn-primary">
                                <input type="file" name="photoToUpload" id="photoToUpload" />
                                Choose File...
                            </label>
                        </div>


                    </form>

                </div>
            </div>
            @foreach ($posts as $p)
            <div class="panel panel-default scroll">
                <div class="panel-heading"><img style="max-width:30px;max-height:30px;"
                 src="{{ asset('storage/app/images/') }}/{{ $p->profilepic }}"><a href="/profiles/{{ $p->uid }}"> {{ $p->name }}</a><div
                        class="pull-right">{{ $p->created_at }}

                        @if(Auth::user()->isadmin == "Y")
                        <a href="{{ url('post/delete') }}/{{ $p->postid }}" class="btn btn-danger">X</a>
                        @endif

                    </div></div>
                <div class="panel-body">
                    {{ $p->content }}
                </div>
                @if (!empty($p->photo))
                <div style="text-align: center;">
                <img style="max-width:100%;max-height:100%;" src="{{ asset('storage/app/images/') }}/{{ $p->photo }}">
                </div>
                @endif
                @if (!empty($p->video))
                <div style="text-align: center;">
                    <iframe scrolling="no" frameborder="0"
                            style="position: relative; height: 315px; width: 100%;" src="{{ $p->video }}"></iframe>
                </div>
                @endif
                <div class="divider"></div>
                @foreach ($comments as $c)
                @if ($c->postid == $p->postid)
                <div class="panel-body"><img style="max-width:30px;max-height:30px;"
                                             src="{{ asset('storage/app/images/') }}/{{ $c->profilepic }}"><a
                        href="/profiles/{{ $p->uid }}"> {{ $c->username }}</a> {{$c->content}}<div
                        class="pull-right text-muted">{{ $c->created_at }}</div></div><div class="divider"></div>
                @endif
                @endforeach
                <div class="panel-body">

                    <div class="vote">{{ $p->votes }} <a href="/postupvote/{{$p->postid}}/{{ Auth::user()->id }}"><span class="glyphicon glyphicon-circle-arrow-up votes"></span></a>
                        <a href="/postdownvote/{{$p->postid}}/{{ Auth::user()->id }}"><span class="glyphicon glyphicon-circle-arrow-down votes"></span></a></div>

                    <label class="newcommentlink-{{$p->postid}}" id="newcommentlink">New Comment</label>
                    <form style="display:none;" id="newcommentform-{{$p->postid}}" action="{{ url('comment/new') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="divider">

                        </div>
                        <div class="form-group">
                            <textarea class="style-text" id="commentcontent"
                                      name="commentcontent" rows=2 cols=10 wrap="hard" placeholder="What do you think?"></textarea>
                            <input type="hidden" name="postid" value="{{ $p->postid }}">
                            <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="divider">
                        </div>
                        <div class="form-group" id="newcomment-submit">
                            <input class="btn btn-primary" type="submit" name="submit" value="Comment" id="submit"/>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
            <div>{{ $posts->links() }}</div>
        </div>

        <div class="col-xs-3 trending">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Trending</h3></div>

                <div class="panel-body">
                    No anime here :c
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {

        $("textarea").keyup(function(e) {
            while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
                $(this).height($(this).height()+1);
            };
        });

        $("#search-profiles").click(function () {
            $("#divider-hidden").slideToggle("slow");
            $("#search-form").slideToggle("slow");
        });

        $("#newpost").click(function () {
            $("#newpost-submit").show("slow");
        });

        $("#add-photo").click(function () {
            $("#addphoto-button").show("slow");
        });

        $("#newcommentlink").click(function () {
            $("#newcommentform").show("slow");
        });

        $("label").click( function(event)
        {
            var clicked = $(this).attr("class"); // jQuery wrapper for clicked element
            var form = clicked.substring(14);
            $('#newcommentform' + form).show();
        });

        });
</script>

@endsection