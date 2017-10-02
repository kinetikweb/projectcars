<?php

namespace App\Http\Controllers;

use Auth;
use App\Modelb;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateModelbRequest;
use App\Http\Requests\UpdateModelbRequest;

class ModelbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = DB::table('brands')->get();

        $modelb = DB::table('modelbs')
                    ->join('brands', 'modelbs.brand_id', '=', 'brands.id')
                    ->select('modelbs.*', 'brands.brand AS brand')
                    ->get();

        return view('models_brand.list', ["modelb" => $modelb, "brand" => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = DB::table('brands')->get();

        return view('models_brand.create', ["brand" => $brand]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateModelbRequest $request)
    {
        $modelb = new Modelb;
        $modelb->modelb = $request->modelb;
        $modelb->brand_id = $request->brand_id;
        $modelb->save();

        return redirect('models')->with('status', 'Create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('models_brand.show', ['modelb' => Modelb::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelb = Modelb::findOrFail($id);

        return view('models_brand.edit', ["modelb" => $modelb]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModelbRequest $request, $id)
    {
        $modelb = Modelb::findOrFail($id);
        $modelb->modelb = $request->modelb;
        $modelb->brand_id = $request->brand_id;
        $modelb->save();

        return redirect('models')->with('status', 'Update succesed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelb = Modelb::findOrFail($id);
        $modelb->delete();

        return redirect('models')->with('status', 'Model was deleted!');
    }
}
