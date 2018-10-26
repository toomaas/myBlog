@extends('layouts.app') 
@section('content') 
    <h1> My Notes </h1> 
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Add note</div>
                    <div class="card-body">
                        @foreach($notes as $note)
                        <li>{{$note->note_content}}</li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Add note</div>
                    <div class="card-body">
                    <form method="POST" action="/notes/">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <textarea name="content" class="form-control"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary"> Add Note</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection