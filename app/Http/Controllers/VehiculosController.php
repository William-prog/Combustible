<?php

namespace App\Http\Controllers;

use App\Models\vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculo = vehiculos::all();
        return view('vehiculo.index', compact('vehiculo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerVehiculo = new vehiculos();

        $registrerVehiculo-> vehiculoEco =$request->vehiculoEco;
        $registrerVehiculo-> vehiculoPlacas =$request->vehiculoPlacas;
        $registrerVehiculo-> vehiculoModelo =$request->vehiculoModelo;
        $registrerVehiculo-> vehiculoMarca =$request->vehiculoMarca;
        $registrerVehiculo-> vehiculoAño =$request->vehiculoAño;
        $registrerVehiculo-> vehiculoCombustible =$request->vehiculoCombustible;
        $registrerVehiculo->save();
        return redirect('panel');
    }

    /**
     * Display the specified resource.
     */
    public function show(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $dato=vehiculos::findOrFail($id);
        return view('vehiculo.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $registrerVehiculo = vehiculos::find($id);

        $registrerVehiculo-> vehiculoEco =$request->vehiculoEco;
        $registrerVehiculo-> vehiculoPlacas =$request->vehiculoPlacas;
        $registrerVehiculo-> vehiculoModelo =$request->vehiculoModelo;
        $registrerVehiculo-> vehiculoMarca =$request->vehiculoMarca;
        $registrerVehiculo-> vehiculoAño =$request->vehiculoAño;
        $registrerVehiculo-> vehiculoCombustible =$request->vehiculoCombustible;
        $registrerVehiculo->save();
        return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehiculos $vehiculos)
    {
        //
    }
}
