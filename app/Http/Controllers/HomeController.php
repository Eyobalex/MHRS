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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect(route('house.index'));
    }

    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('lessor.property', compact('house'));
//        return view('about');
//        return dd($house);
    }
}
