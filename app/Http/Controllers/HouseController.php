<?php

namespace App\Http\Controllers;

use App\House;
use App\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


/*CALLING A CONTROLLER FORM TINKER
 * $controller = app()->make('App\Http\Controllers\HouseController');
 * app()->call([$controller, 'index'],[]); // with out parameter
 *app()->call([$controller, 'store'],[param1 => $request]); // with parameters
 *
 * */

class HouseController extends Controller
{
    private $uploadPath ;

    public function __construct ()
    {
//        parent::__construct();
        $this->uploadPath = public_path(config('mhrs.image.directory'));
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::orderBy('views')->take(5)->get();
        return view('index', compact("houses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param House $house
     * @return \Illuminate\Http\Response
     */
    public function create(House $house)
     {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        return view('about');
//        return dd($house);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->delete();
        $this->removeImage($house->image);

    }



}
