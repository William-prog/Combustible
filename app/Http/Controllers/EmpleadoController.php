<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function fetchEmp(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');


            if ($query != '' && empleado::where('empleadoNumero', '=', $query)->exists()) {
                $response = DB::table('empleados')->where('empleadoNumero', 'like', $query)->get();
                $data = $response;

                foreach ($data as $key) {
                    $info = array(
                        'valeSolicitante' => $key->empleadoNombre,
                    );
                }
                echo json_encode($info);
            } else {
                if (strlen($query) == 3) {
                    echo json_encode("NO HAY EMPLEADO REALACIONADO");
                    $info = array(
                        'valeSolicitante' => '',
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
