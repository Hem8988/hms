<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function getAbout()
    {
        $about = About::all();
        return view('admin.about.list', ['about' => $about]);
    }
    public function edit()
    {
        $about = About::find(1);
        return view('admin.about.edit', ['about' => $about]);
    }
    public function Aboutpost(Request $request)
    {
        $this->validate(
            $request,
            [
                'body' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'video' => 'required',

            ],
            [
                'body.required' => "You did not enter content",
                'image.required' => "You have not imported image",
                'video.required' => "You haven't imported the video yet",



            ]
        );

        $about = About::find(1);
        $about->body = $request->body;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('home/images'), $imageName);
            $about->image = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
 
        $about->video = $request->video;

        $about->save();


        return redirect('AboutList')->with('annoucement', 'Edit hotel information successfully');
    }
}
