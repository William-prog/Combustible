<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Models\departamentos;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleado = empleado::all();
        $departamento = departamentos::all();
        return view('empleado.index', compact('empleado', 'departamento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = departamentos::all();
        return view('empleado.create', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerEmpleado = new empleado();

        $registrerEmpleado-> empleadoNumero =$request->empleadoNumero;
        $registrerEmpleado-> empleadoNombre =$request->empleadoNombre;
        $registrerEmpleado-> empleadoPuesto =$request->empleadoPuesto;
        $registrerEmpleado-> empleadoDepartamento =$request->empleadoDepartamento;

        $registrerEmpleado->save();
        return redirect('panel');
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dato = empleado::findOrFail($id);
        $departamento = departamentos::all();
        return view('empleado.edit', compact('dato','departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $registrerEmpleado = empleado::find($id);
        $registrerEmpleado-> empleadoNumero =$request->empleadoNumero;
        $registrerEmpleado-> empleadoNombre =$request->empleadoNombre;
        $registrerEmpleado-> empleadoPuesto =$request->empleadoPuesto;
        $registrerEmpleado-> empleadoDepartamento =$request->empleadoDepartamento;

        $registrerEmpleado->save();
        return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
