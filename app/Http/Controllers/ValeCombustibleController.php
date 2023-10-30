<?php

namespace App\Http\Controllers;

use App\Models\valeCombustible;
use App\Http\Controllers\Controller;
use App\Models\departamentos;
use App\Models\area;
use Carbon\Carbon;
use App\Models\empleado;
use Illuminate\Http\Request;

class ValeCombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vale = valeCombustible::all();
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $fechaActual = Carbon::now();
        return view('valeCombustible.index', compact('vale', 'departamento', 'empleado'));
    }

    public function actualizarEstado($id, Request $request)
    {
        $estadoSeleccionado = $request->input('estadoSeleccionado');
        $dato = valeCombustible::find($id);
        $dato->valeEstado = $estadoSeleccionado;
        $dato->save();
        return redirect()->route('valeCombustible')->with('mensaje', 'Estado actualizado con éxito');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = departamentos::all();
        $area = area::all();
        $empleado = empleado::all();
        $fechaActual = Carbon::now();
        return view('valeCombustible.create', compact('departamento', 'fechaActual', 'empleado', 'area'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerVale = new valeCombustible();
        $registrerVale->valeFecha = $request->valeFecha;
        $registrerVale->valeNumero = $request->valeNumero;
        $registrerVale->valeSolicitante = $request->valeSolicitante;
        $registrerVale->valeDepartamento = $request->valeDepartamento;
        $registrerVale->valeArea = $request->valeArea;
        $registrerVale->valeCc = $request->valeCc;

        $registrerVale->valeEconomico = $request->valeEconomico;
        $registrerVale->valePlacas = $request->valePlacas;
        $registrerVale->valeCombustible = $request->valeCombustible;
        $registrerVale->valeMarca = $request->valeMarca;
        $registrerVale->valeModelo = $request->valeModelo;
        $registrerVale->valeAño = $request->valeAño;
        $registrerVale->valeKilometraje = $request->valeKilometraje;
        $registrerVale->valeLitros = $request->valeLitros;
        $registrerVale->valeCantidad = $request->valeCantidad;

        $registrerVale->valeEstado =  'Pendiente';

        $registrerVale->save();
        return redirect('valeCombustible');
    }

    /**
     * Display the specified resource.
     */
    public function show(valeCombustible $valeCombustible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dato = valeCombustible::findOrFail($id);
        $vale = valeCombustible::all();
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $fechaActual = Carbon::now();
        return view('valeCombustible.edit', compact('dato', 'departamento', 'empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(valeCombustible $valeCombustible)
    {
        //
    }
}