<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Description;
use App\Models\Slide;
use App\Models\CategoryFood;
use App\Models\Review;
use App\Models\Event;
use App\Models\room_Category;
use App\Models\About;
use App\Models\Information;
use App\Models\room;

class PageController extends Controller
{

    public function Home()
    {
        $food_category = CategoryFood::all();
        $category = room_Category::all();
        $category = room_Category::all();
        $review = Review::all();
        $infor = Information::all();
        $about = About::all();
        $description = Description::all();
        $slide  = Slide::all();
        $event   = Event::all();

        return view('frontend.Home', [
            'food_category' => $food_category, 'event' => $event,
            'slide' => $slide,  'category' => $category, 'review' => $review,
            'infor' => $infor, 'about' => $about, 'description' => $description
        ]);
    }
    public function About()
    {
        $description = Description::all();
        $about = About::all();
        $slide  = Slide::all();
        $infor = Information::all();

        return view('frontend.About', ['about' => $about, 'description' => $description, 'slide' => $slide, 'infor' => $infor]);
    }
    public function Event()
    {

        $description = Description::all();
        $about = About::all();
        $slide  = Slide::all();
        $infor = Information::all();
        $event   = Event::all();
        return view('frontend.Events', ['about' => $about, 'description' => $description, 'slide' => $slide, 'infor' => $infor, 'event' => $event]);
    }
    public function Rooms()
    {
        $room = room::all();
        $category = room_Category::all();
        $infor = Information::all();
        return view('frontend.Rooms', ['room' => $room, 'category' => $category, 'infor' => $infor]);
    }
    public function Reservation($idCate)
    {
        return view('pages.Reservation', ['idCate' => $idCate]);
    }
}
