@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-9">
            <div class="panel panel-default" style="margin-left:20px;margin-right:20px;">
                <div class="panel-heading"><h3>Create Message</h3></div>
                    <form action="{{ route('messages.store') }}" method="post">
                        {{ csrf_field() }}
                            <!-- Subject Form Input -->
                            <div style="margin-left:20px;margin-right:20px;" class="form-group">
                                <label class="control-label">Subject</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                       value="{{ old('subject') }}">
                            </div>
                            <!-- Message Form Input -->
                            <div style="margin-left:20px;margin-right:20px;" class="form-group">
                                <label class="control-label">Message</label>
                                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                            </div>
                            @if($users->count() > 0)
                                <div style="margin-left:20px;" class="checkbox">
                                    @foreach($users as $user)
                                        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                                value="{{ $user->id }}">{!!$user->name!!}</label>
                                    @endforeach
                                </div>
                            @endif
                            <!-- Submit Form Input -->
                            <div  style="margin-left:20px;margin-right:20px;" class="form-group">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                    </form>
             </div>
        </div>
    </div>
</div>
@stop
