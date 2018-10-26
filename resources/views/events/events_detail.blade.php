@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{$event->title}}</h3>
                    <br>
                    <img src="/images/event_photos/{{$event->filepath}}" height='50%' width='50%'>
                    <br>
                    <p>{{$event->description}}</p>
                    <hr>
                    <h4>Attending</h4>
                    <ol>
                        @foreach($event->users()->get() as $user)
                            <li>{{$user->name}}</li>
                        @endforeach
                    </ol>
                    <hr>
                    <form method="POST" action="/events/attend">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <button type="submit" class="btn btn-primary"> Attend </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection