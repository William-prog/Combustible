<?php

namespace App\Http\Controllers;

use App\Models\vehiculos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
    public function fetchCar(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');


            if ($query != '' && vehiculos::where('vehiculoEco', '=', $query)->exists()) {
                $response = DB::table('vehiculos')->where('vehiculoEco', 'like', $query)->get();
                $data = $response;
                foreach ($data as $key) {
                    $info = array(
                        'valePlacas' => $key->vehiculoPlacas,
                        'valeCombustible'=>$key->vehiculoCombustible,
                        'valeMarca'=>$key->vehiculoMarca,
                        'valeModelo' => $key->vehiculoModelo,
                        'valeAño' =>$key->vehiculoAño,
                    );
                }
                echo json_encode($info);
            } else {
                if (strlen($query) == 3) {
                    echo json_encode("NO HAY VEHICULO RELACIONADO");
                    $info = array(
                        'valePlacas' => '',
                        'valeCombustible' => '',
                        'valeMarca' => '',
                        'valeModelo' => '',
                        'valeAño' => '',
                       
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
        return redirect('vehiculo');
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
        $registrerdepartamento = vehiculos::find($id);

        $registrerVehiculo-> vehiculoEco =$request->vehiculoEco;
        $registrerVehiculo-> vehiculoPlacas =$request->vehiculoPlacas;
        $registrerVehiculo-> vehiculoModelo =$request->vehiculoModelo;
        $registrerVehiculo-> vehiculoMarca =$request->vehiculoMarca;
        $registrerVehiculo-> vehiculoAño =$request->vehiculoAño;
        $registrerVehiculo-> vehiculoCombustible =$request->vehiculoCombustible;
        $registrerVehiculo->save();
        return redirect('vehiculo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vehiculos $vehiculos)
    {
        //
    }
}
