<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;

class DescriptionController extends Controller
{
    public function getDescription()
    {
        $description = Description::all();
        return view('admin.description.list', ['description' => $description]);
    }
    public function editDescriptionShow()
    {
        $description = Description::find(1);
        return view('admin.description.edit', ['description' => $description]);
    }
    public function editDescription(Request $request)
    {
        $this->validate(
            $request,
            [
                'room' => 'required',
                'photo' => 'required',
                'menu' => 'required',
                'event' => 'required',

            ],
            [
                'room.required' => "You did not enter content",
                'photo.required' => "You have not entered a photo",
                'menu.required' => "You have not entered the menu",
                'event.required' => "You have not entered the event",



            ]
        );

        $description = Description::find(1);
        $description->room = $request->room;
        $description->photo = $request->photo;
        $description->menu = $request->menu;
        $description->event = $request->event;

        $description->save();


        return redirect('descriptionList')->with('annoucement', '
        Edit hotel information successfully');
    }
}
