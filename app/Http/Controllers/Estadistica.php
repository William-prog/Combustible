<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kilometraje;
use App\Models\empleado;
use App\Models\departamentos;
use App\Models\vehiculos;
use App\Models\area;
use App\Models\valeCombustible;
use App\Models\consumo;

class Estadistica extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

     
    public function index()
    {
        // Obtén los datos de consumo
        $consumo = consumo::all();
        $vehiculos = vehiculos::all();
        $departamentos = departamentos::all();

        return view('estadistica.index', compact('consumo', 'vehiculos', 'departamentos'));
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
