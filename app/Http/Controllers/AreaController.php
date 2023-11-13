<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\departamentos;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        $area = area::all();
        $departamento = departamentos::all();
        return view('area.index', compact('area','departamento'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamento = departamentos::all();
        return view('area.create', compact('departamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerArea = new area();
        $registrerArea->areaNombre = $request->areaNombre;
        $registrerArea->areaDepartamento = $request->areaDepartamento;
        $registrerArea->areaDescripcion = $request->areaDescripcion;

        $registrerArea->save();

        return redirect('panel');
    }

    /**
     * Display the specified resource.
     */
    public function show(area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dato = area::findOrFail($id);
        $departamento = departamentos::all();
        return view('area.edit', compact('dato','departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $registrerArea = area::find($id);

        $registrerArea->areaNombre = $request->areaNombre;
        $registrerArea->areaDepartamento = $request->areaDepartamento;
        $registrerArea->areaDescripcion = $request->areaDescripcion;
        $registrerArea->save();

        return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(area $area)
    {
        //
    }
}
