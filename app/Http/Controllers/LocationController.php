<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Fiber;
use App\Models\Wireless;

class LocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-local|crear-local|editar-local|borrar-local', ['only'=>['index','store']]);
        $this->middleware('permission:crear-local', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-local', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-local', ['only'=>['destroy']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(5);
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.crear');
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
            'address' => 'required',
            'name' => 'required'
        ]);

        Location::create($request->all());
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* $locations = Location::first($id);
        return view('locations.editar', compact('locations')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::where('id', $id)->first();
        return view('locations.editar', compact('locations'));

        //$user = User::find($id);
        //$roles = Role::pluck('name', 'name')->all();
        //$userRole = $user->roles->pluck('name', 'name')->all();

        //return view('usuarios.editar', compact('user', 'roles', 'userRole'));
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
        request()->validate([
            'address' => 'required',
            'name' => 'required'
        ]);
        $location = Location::find($id)->first();
        $location->update($request->all());
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::where('id', $id)->first();
        $fiber = Fiber::where('location_id',$id);
        $fiber->delete();
        $location->delete();
        return redirect()->route('locations.index');
    }
}
