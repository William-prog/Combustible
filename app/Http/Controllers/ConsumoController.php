<?php

namespace App\Http\Controllers;

use App\Models\consumo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportConsumo;
use App\Exports\ExportConsumo;


class ConsumoController extends Controller
{

    // public function import() 
    // {
    //     Excel::import(new ImportConsumo, 'users.xlsx');
        
    //     return redirect('/')->with('success', 'All good!');
    // }

    // public function importView(Request $request){
    //     return view('importFile');
    // }
 
    public function import(Request $request){
        Excel::import(new ImportConsumo, $request->file('file')->store('files'));
        return redirect()->back();
    }
 
    public function exportConsumo(Request $request)
    {
         return Excel::download(new ExportConsumo, 'consumo.xlsx');
     }

    public function index()
    {
        return view('excel.index');
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
    public function show(consumo $consumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(consumo $consumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, consumo $consumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(consumo $consumo)
    {
        //
    }

    
}
