<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;

class EventsController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user){
            $events = Event::all();
            return view('events.events',compact('events'));
        }else
            return("/");
    }

    public function add(Request $request){
        $user = Auth::user();
        if($user){
            $file = $request->file('event_photo');
            $filename = time().'-'.$file->getClientOriginalName();
            $file = $file->move('images/event_photos',$filename);

            $event = new Event;
            $event->filepath = $filename;
            $event->title = $request->title;
            $event->description = $request->description;
            $event->save();
            return redirect('/events');
        }else{
            return redirect('/');
        }
    }

    public function showDetails($id){
        $event = Event::find($id);
        return view('events.events_detail',compact('event'));
    }

    public function registUserEvent(Request $request){
        $user = Auth::user();
        if($user){
            $event = Event::find($request->event_id);
            $user->events()->attach($request->event_id);
            //$event->users()->attach($user->id);
            return view('events.events_detail',compact('event'));
        }
    }
}
