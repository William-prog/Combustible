<?php

namespace App\Http\Controllers;

use App\Models\valeGasolina;
use App\Http\Controllers\Controller;
use App\Models\departamentos;
use Carbon\Carbon;
use App\Models\empleado;
use Illuminate\Http\Request;

class ValeGasolinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vales = valeGasolina::all();
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $fechaActual = Carbon::now();
        return view('valesGasolina.index', compact('vales','departamento','empleado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $fechaActual = Carbon::now();
        return view('valesGasolina.create',compact('departamento','fechaActual','empleado'));
        
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerVale = new valeGasolina();
        $registrerVale-> valeFecha =$request->valeFecha ;
        $registrerVale-> valeNumero =$request->valeNumero ;
        $registrerVale-> valeSolicitante =$request->valeSolicitante ;
        $registrerVale-> valeDepartamento =$request->valeDepartamento ;
        $registrerVale-> valeArea =$request->valeArea ;
        $registrerVale-> valeCc =$request->valeCc ;

        
        
        $registrerVale->save();
        return redirect('valesGasolina');


    }

    /**
     * Display the specified resource.
     */
    public function show(valeGasolina $valeGasolina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(valeGasolina $valeGasolina)
    {
        $dato = valeGasolina::findOrFail($id);
        $empleado = empleado::all();
        return view('valesGasolina.edit', compact('valeGasolina','empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $registrerVale = valeGasolina::find($id);
        $registrerVale-> valeFecha =$request->valeFecha ;
        $registrerVale-> valeNumero =$request->valeNumero ;
        $registrerVale-> valeSolicitante =$request->valeSolicitante ;
        $registrerVale-> valeDepartamento =$request->valeDepartamento ;
        $registrerVale-> valeArea =$request->valeArea ;
        $registrerVale-> valeCc =$request->valeCc ;
        
        $registrerVale->save();
        return redirect('valesGasolina');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(valeGasolina $valeGasolina)
    {
        //
    }
}
