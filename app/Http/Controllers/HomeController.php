<?php

namespace App\Http\Controllers;

use App\House;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $houses = House::with('photo')->havePhoto()->orderBy('views', 'desc')->take(5)->get();
//        foreach ($houses as $house){
//            return dd($house->imageUrlSlide);
//        }
        return view('index', compact("houses"));

//        return "hello";
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('lessor.property', compact('house'));
    }
}
