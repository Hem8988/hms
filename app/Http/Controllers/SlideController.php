<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;



class SlideController extends Controller
{
    public function getSlide()
    {
        $slide = Slide::all();
        return view('admin.slide.list', ['slide' => $slide]);
    }
    public function slideEditShow($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit', ['slide' => $slide]);
    }
    public function Editslide(Request $request, $id)
    {
        // dd($request->link);
        $this->validate(
            $request,
            [

                'caption' => 'required',

            ],
            [

                'caption.required' => "You have not entered the image caption",

            ]
        );

        $slide = Slide::find($id);
        // $slide->link=$request->link;
        $slide->caption = $request->caption;
        if ($request->hasFile('link')) {
            $imageName = time() . '.' . $request->link->extension();
            $request->link->move(public_path('home/slide/images'), $imageName);
            $slide->link = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
        $slide->save();


        return redirect('slide&&list')->with('annoucement', 'Edit slide information successfully');
    }

    public function Add()
    {
        return view('admin.slide.add');
    }


    public function AddSlide(Request $request)
    {

        // dd($request->link);


        $this->validate(
            $request,
            [
                'link' => 'required',
                'caption' => 'required',

            ],
            [
                'link.required' => "You have not entered the image link",
                'caption.required' => "You have not entered the image caption",

            ]
        );

        $slide = new Slide;
        if ($request->hasFile('link')) {
            $imageName = time() . '.' . $request->link->extension();
            $request->link->move(public_path('home/slide/images'), $imageName);
            $slide->link = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
        $slide->caption = $request->caption;
        $slide->save();

        return redirect('slide&&list')->with('annoucement', '
        Successfully added slides');
    }
    public function slideDelete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('slide&&list')->with('annoucement', '
        Delete slide successfully');
    }
}
