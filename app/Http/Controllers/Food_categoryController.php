<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category_food;

class Food_categoryController extends Controller
{
    public function inserCategory(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:category_foods',


            ],
            [
                'name.required' => "You have Not Enter The Food Category",

            ]
        );
        $categoryFood = new category_food;
        $categoryFood->name = $request->name;
        $categoryFood->save();
        return redirect('addFoodCategory')->with('annoucement', 'data added successfully');
        
    }

    public function Editfood($id)
    {
        // dd($id);die;
        $food_categoryEdit = category_food::find($id);
        return view('admin.foodCategory.edit', ['food_categoryEdit' => $food_categoryEdit]);
    }

    public function EditfoodPost(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|unique:category_foods',


            ],
            [
                'name.required' => "You have Not Enter The Food Category",

            ]
        );
        $categoryFood = category_food::find($id);;
        $categoryFood->name = $request->name;
        $categoryFood->save();
        return redirect('list&&Category')->with('annoucement', 'data added successfully');
        
    }

    public function Delete($id){
        
        $room = category_food::find($id);
        $room->delete();
        return redirect('list&&Category')->with('annoucement', 'Room deleted successfully');
    }
}
