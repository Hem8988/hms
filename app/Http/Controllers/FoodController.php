<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\category_food;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function getFood()
    {
        // $food = Food::all();
        $food = DB::table('foods')
        ->join('category_foods', 'foods.idCategory', "=", 'category_foods.id')
        ->select('foods.*', 'category_foods.name')
        ->get();
        return view('admin.food.list', ['food' => $food]);
    }
    public function showEdit($id)
    {
        $categoryFood = category_food::all();
        $food = Food::find($id);
        return view('admin.food.edit', ['food' => $food, 'categoryFood' => $categoryFood]);
    }
    public function Editfood(Request $request, $id)
    {
        // dd($request->all());
        $this->validate(
            $request,
            [
                'food_name' => 'required',
                'description' => 'required',
                'price' => 'required',


            ],
            [
                'food_name.required' => "You have not entered the dish name",
                'description.required' => "you have entered the description",
                'price.required' => "you have entered the price",


            ]
        );

        $food = Food::find($id);
        $food->food_name = $request->food_name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->idCategory = $request->idCategory;



        $food->save();


        return redirect('/list/food')->with('annoucement', 'Food has been updated');
    }

    public function AddFood(Request $request)
    {

        // dd($request->all());
        $this->validate(
            $request,
            [
                'food_name' => 'required|unique:foods',
                'description' => 'required',
                'price' => 'required',


            ],
            [
                'food_name.required' => "name is required",
                'description.required' => "Description is required",
                'price.required' => "Price is required",


            ]
        );

        $food = new Food;
        $food->food_name = $request->food_name;
        $food->description = $request->description;
        $food->price = $request->price;
        $food->idCategory = $request->idCategory;
        $food->save();
        return redirect('addFood')->with('annoucement', 'Food is added successfully');
    }
    public function Delete($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect('/list/food')->with('annoucement', 'Food is deleted successfully');
    }
}
