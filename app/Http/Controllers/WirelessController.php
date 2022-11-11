<?php

namespace App\Http\Controllers;

use App\Models\Wireless;
use App\Models\Location;
use Illuminate\Http\Request;

class WirelessController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-wireless|crear-wireless|editar-wireless|borrar-wireless', ['only'=>['index','store']]);
        $this->middleware('permission:crear-wireless', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-wireless', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-wireless', ['only'=>['destroy']]);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wireless = Wireless::paginate(5);
        return view('wireless.index', compact('wireless'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wireless.crear');
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

        Wireless::create($request->all());
        return redirect()->route('wireless.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function show(Wireless $wireles)
    {
        //return view('wireless.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function edit(Wireless $wireles)
    {
        $wireles = Wireless::find($id)->first();
        return view('wireless.editar', compact('wireles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wireless $wireles)
    {
        request()->validate([
            'name' => 'required',
            'ip' => 'required',
            'location_id' => 'required'
        ]);
        $wireles = Wireless::find($id)->first();
        $fiber->update($request->all());
        return redirect()->route('wireless.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wireless  $wireless
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wireless $wireles)
    {
        $wireles = Wireless::find($id)->first();
        $fiber->delete();
        return redirect()->route('wireless.index');
    }
    public function getWirelessByLocation($id)
    {
        $location = Location::find($id)->first();
        $wireles = Wireless::where('location_id',$id)->paginate(5);
        return view('wireless.fiber_location', compact('wireles','location'));
    }
}