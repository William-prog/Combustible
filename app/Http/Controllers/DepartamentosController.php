<?php

namespace App\Http\Controllers;

use App\Models\departamentos;
use App\Models\valeCombustible;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamento = departamentos::all();
        return view('departamento.index', compact('departamento'));
    }
    
    public function fetchDep(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');


            if ($query != '' && departamentos::where('id', '=', $query)->exists()) {
                $response = DB::table('departamentos')->where('id', 'like', $query)->get();
                $data = $response;

                foreach ($data as $key) {
                    $info = array(
                        'valeCc' => $key->departamentoCC,
                    );
                }
                echo json_encode($info);
            } else {
                if (strlen($query) == 3) {
                    echo json_encode("NO HAY DEPARTAMENTOS REALACIONADO");
                    $info = array(
                        'valeCc' => '',
                    );
                }
            }
        }
    }
    

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registrerdepartamento = new departamentos();

        $registrerdepartamento->departamentoNombre = $request->departamentoNombre;
        $registrerdepartamento->departamentoCC = $request->departamentoCC;
        $registrerdepartamento->departamentoDescripcion = $request->departamentoDescripcion;
        $registrerdepartamento->departamentoArea = $request->input('departamentoArea',"Sin Seleccion");

        $registrerdepartamento->save();
        
        return redirect('panel');
    }

    /**
     * Display the specified resource.
     */
    public function show(departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dato = departamentos::findOrFail($id);
        return view('departamento.edit', compact('dato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $registrerdepartamento = departamentos::find($id);

        $registrerdepartamento->departamentoNombre = $request->departamentoNombre;
        $registrerdepartamento->departamentoCC = $request->departamentoCC;
        $registrerdepartamento->departamentoDescripcion = $request->departamentoDescripcion;
        $registrerdepartamento->departamentoArea = $request->departamentoArea;

        $registrerdepartamento->save();
        
        return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departamentos $departamentos)
    {
        //
    }
}
