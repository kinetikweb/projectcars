<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Car;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = DB::table('cars')
                    ->join('brands', 'cars.brand_id', '=', 'brands.id')
                    ->join('modelbs', 'cars.modelb_id', '=', 'modelbs.id')
                    ->join('engines', 'cars.engine_id', '=', 'engines.id')
                    ->join('colors', 'cars.color_id', '=', 'colors.id')
                    ->select('cars.*',
                            'brands.brand AS brand',
                            'modelbs.modelb AS modelb',
                            'engines.engine AS engine',
                            'colors.color AS color')
                    ->get();

        return view('cars.list', ["car" => $car]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = DB::table('brands')->get();
        $modelb = DB::table('modelbs')->get();
        $engine = DB::table('engines')->get();
        $color = DB::table('colors')->get();

        $data = [
            "brand"    => $brand,
            "modelb"    => $modelb,
            "engine"   => $engine,
            "color"    => $color,
        ];

        return view('cars/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCarRequest $request)
    {
        $car = new Car;
        $car->price = $request->price;
        $car->modelb_id = $request->modelb;
        $car->brand_id = $request->brand;
        $car->engine_id = $request->engine;
        $car->color_id = $request->color;

        $image = $request->file('image');
        $filename = time().'-'.$image->getClientOriginalName();
        Image::make($image->getRealPath())->save(public_path('images/'.$filename));

        $car->photo = $filename;
        $car->save();

        return redirect('cars')->with('status', 'Create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cars.show', ['car' => Car::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('cars/edit', ["car" => $car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->price = $request->price;
        $car->modelb_id = $request->modelb;
        $car->brand_id = $request->brand;
        $car->engine_id = $request->engine;
        $car->color_id = $request->color;

        if ($request->hasFile('image')) {
            $old_image = $car->image;
            if ($old_image!=null) {
                unlink(public_path('images/'.$old_image));
            }
            $image = $request->file('image');
            $filename = time().'-'.$image->getClientOriginalName();
            Image::make($image->getRealPath())->save(public_path('images/'.$filename));

            $car->image = $filename;
        }
        $car->save();

        return redirect('cars')->with('status', 'Update succesed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $image = $car->image;
        Storage::delete(public_path('images/'.$image));
        $car->delete();

        return redirect('cars')->with('status', 'Model was deleted!');
    }
}
