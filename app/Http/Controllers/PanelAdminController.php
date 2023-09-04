<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleado;
use App\Models\departamentos;
use App\Models\vehiculos;
use App\Models\area;

class PanelAdminController extends Controller
{
    
    public function index()
    {
        $empleado = empleado::all();
        $departamento = departamentos::all();
        $vehiculo = vehiculos::all();
        $area = area::all();
       return view('adminPanel.index', compact('empleado', 'departamento','vehiculo','area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
