<?php

namespace App\Http\Controllers;

use Auth;
use App\Engine;
use Illuminate\Http\Request;
use App\Http\Requests\CreateEngineRequest;
use App\Http\Requests\UpdateEngineRequest;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engine = Engine::all();

        return view('engines.list', ["engine" => $engine]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('engines/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEngineRequest $request)
    {
        $engine = new Engine;
        $engine->engine = $request->engine;
        $engine->save();

        return redirect('engines')->with('status', 'Create succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('engines.show', ['engine' => Engine::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $engine = Engine::findOrFail($id);

        return view('engines.edit', ["engine" => $engine]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEngineRequest $request, $id)
    {
        $engine = Engine::findOrFail($id);
        $engine->engine = $request->engine;
        $engine->save();

        return redirect('engines')->with('status', 'Update succesed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engine = Engine::findOrFail($id);
        $engine->delete();

        return redirect('engines')->with('status', 'Engine was deleted!');
    }
}
