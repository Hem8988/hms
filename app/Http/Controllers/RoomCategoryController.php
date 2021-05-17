<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room_Category;

class RoomCategoryController extends Controller
{

    
    //add category
    public function addCategoryroom(Request $request)
    {
        $this->validate(
            $request,
            [

                'name' => 'required|unique:room__categories|max:20',
                'price' => 'required',
                'description' => 'required',
                'image'    =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'

            ],
            [

                'name.required' => "You have not entered a room type name",
                'price.required' => "You have not entered the room type rate",
                'description.required' => "You have not entered a room type description",
                'image.required' => "You have not entered a room type image"

            ]
        );

        $roomCategory = new room_Category;
        $roomCategory->name = $request->name;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $roomCategory->image = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
        $roomCategory->price = $request->price;
        $roomCategory->description = $request->description;
        $roomCategory->save();
        return redirect('roomcategory')->with('status', 'data added successfully');
    }

    //list of category
    public function roomList()
    {
        $roomList = room_Category::all();
        return view('admin.room_category.list', ['room__categories' => $roomList]);
    }




    //show category
    public function ShowEditCategory($id)
    {
        $roomList = room_Category::find($id);
        return view('admin.room_category.edit', ['room__categories' => $roomList]);
    }




    // /show edit category form
    public function EditCategory(Request $request, $id)
    {
        $this->validate(
            $request,
            [

                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],
            [

                'name.required' => "You have not entered a room type name",
                'price.required' => "You have not entered the room type rate",
                'description.required' => "You have not entered a room type description",

            ]
        );
        $roomCategory = room_Category::find($id);
        $roomCategory->name = $request->name;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $roomCategory->image = $imageName;
        } else {
            $fileNameToStore = 'noimage';
        }
        $roomCategory->price = $request->price;
        $roomCategory->description = $request->description;
        $roomCategory->save();
        return redirect('roomlist')->with('status', 'data update successfully');
    }


    //delete category
    public function delete($id)
    {

        $room = room_Category::find($id);
        $room->delete();
        return redirect('roomlist')->with('annoucement', 'Room type deleted successfully');
    }
}
