<?php

namespace App\Http\Controllers;

use App\Models\Fiber;
use App\Models\Location;
use Illuminate\Http\Request;

class FiberController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-fiber|crear-fiber|editar-fiber|borrar-fiber', ['only'=>['index','store']]);
        $this->middleware('permission:crear-fiber', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-fiber', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-fiber', ['only'=>['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fibers = Fiber::get()->paginate(5);
        return view('fibers.fiber_location', compact('fibers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fibers.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'ip' => 'required',
            'location_id' => 'required'
        ]);

        Fiber::create($request->all());
        return redirect()->route('fibers.fiber_location');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fiber  $fiber
     * @return \Illuminate\Http\Response
     */
    public function show(Fiber $fiber)
    {
        //return view('fibers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fiber  $fiber
     * @return \Illuminate\Http\Response
     */
    public function edit(Fiber $fiber, Request $request)
    {
        //$fiber = Fiber::find($id)->first();
        return view('fibers.editar', compact('fiber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fiber  $fiber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiber $fiber)
    {
        request()->validate([
            'name' => 'required',
            'ip' => 'required',
            'location_id' => 'required'
        ]);
        $fiber = Fiber::find($id)->first();
        $fiber->update($request->all());
        return redirect()->route('fibers.fiber_location');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fiber  $fiber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiber $fiber)
    {
        $fiber = Fiber::find($id)->first();
        $fiber->delete();
        return redirect()->route('fibers.fiber_location');
    }

    public function getFiberByLocation($id)
    {
        $location = Location::find($id)->first();
        $fibers = Fiber::where('location_id',$id)->paginate(5);
        return view('fibers.fiber_location', compact('fibers','location'));
    }

    
}