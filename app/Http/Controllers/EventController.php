<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function Add()
    {
        return view('admin.event.add');
    }


    public function AddPost(Request $request)
    {
        // dd($request->image);
        $event = new Event;
        $this->validate(
            $request,
            [
                'name' => 'required',
                'body' => 'required',
                'image' => 'required',

            ],
            [
                'name.required' => "Name is required",
                'body.required' => "Body is required",
                'image.required' => 'required|image|mimes:jpeg,png,jpg,gif',

            ]
        );

        $event = new Event;
        $event->name = $request->name;
        $event->body = $request->body;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('home/event/image'), $imageName);
            $event->image = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
        $event->save();


        return redirect('list')->with('annoucement', 'More successful events');
    }

    public function getEvent()
    {
        $event = Event::all();
        return view('admin.event.list', ['event' => $event]);
    }

    public function Edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit', ['event' => $event]);
    }

    public function EditPost(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'body' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif',


            ],
            [
                'name.required' => "You have not entered the event name",
                'body.required' => "You did not enter content",
                // 'image.required' => "You have not imported image",




            ]
        );

        $event = Event::find($id);

        $event->name = $request->name;
        $event->body = $request->body;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('home/event/image'), $imageName);
            $event->image = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }


        $event->save();


        return redirect('list')->with('annoucement', 'Edit successful event information');
    }

    public function Delete($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('list')->with('annoucement', 'Successful event deletion');
    }
}
