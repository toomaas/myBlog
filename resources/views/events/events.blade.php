@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Add Event</div>
                    <div class="card-body">
                        <form method="POST" action="/events/" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            Title: <br>
                            <input type="text" name="title" class="form-control"/>
                            Description: <br>
                            <input type="text" name="description" class="form-control"/>
                            <br>
                            <input type="file" name="event_photo" title="Event Photo"><br><br>
                            <button type="submit" class="btn btn-primary"> Add Event</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">All Events</div>
                    <div class="card-body">
                        <div class="panel-body">
                        @foreach($events as $event)
                          <li><a href="\events\{{$event->id}}">{{$event->title}}</a></li>
                        @endforeach
                        </div>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
    </div>
@endsection