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
        $houses = House::all();
        return view('lessor.index', compact("houses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param House $house
     * @return \Illuminate\Http\Response
     */
    public function create(House $house)
     {
        return view('lessor.upload', compact('house'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $house = new House();
        $data = $this->handleRequest($request);
        if (isset($data['image'])){
            $photo = new Photo();
            $photo->extension = $request->file('image')->getClientOriginalExtension();
            $photo->imagePath =  $data['image'];
            $photo->save();
            $house->photo_id = $photo->id;
        }
        $house->title = $request->title;
        $house->slug = $request->slug;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->location = $request->location;
        $house->lessor_id = $request->lessor_id;
        $house->save();

        return redirect(route('house.index'))->with('message', 'You have successfully uploaded a new house.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $house = House::findOrFail($id);
       return view('lessor.propertys', compact('house'));
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
        $house = House::findOrFail($id);
        return view('lessor.edit', compact('house'));
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
        $house = House::findOrFail($id);
        $oldImage = $house->image;
        $data = $this->handleRequest($request);
        $house->update($data);
        if ($oldImage !== $house->image) {
            $this->removeImage($oldImage);
        }
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


    private function handleRequest(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;
            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $extension = $image->getClientOriginalExtension();
                $property = str_replace(".{$extension}", "_property.{$extension}", $fileName);
                $slide = str_replace(".{$extension}", "_slide.{$extension}", $fileName);
                Image::make($destination . '/' . $fileName)->resize(config('mhrs.image.property.width'), config('mhrs.image.property.height'))->save($destination . '/' . $property);
                Image::make($destination . '/' . $fileName)->resize(config('mhrs.image.slide.width'), config('mhrs.image.slide.height'))->save($destination . '/' . $slide);
            }

            $data['image'] = $fileName;
        }

        return $data;
    }
}
