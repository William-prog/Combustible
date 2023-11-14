<?php

namespace App\Http\Controllers;

use App\Models\valeCombustible;
use App\Http\Controllers\Controller;
use App\Models\departamentos;
use App\Models\area;
use Carbon\Carbon;
use App\Models\empleado;
use Illuminate\Http\Request;
use App\Mail\solicitudVale;
use App\Mail\valeAceptado;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class ValeCombustibleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function informePDF($id)
    {
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $registro = valeCombustible::find($id);
        $pdf = \PDF::loadView('PDF.formatosPdf', compact('id', 'registro', 'empleado', 'departamento'));
        return $pdf->stream('responsiva.pdf', array("Attachment" => true));
    }
    
    public function index()
    {
        $vale = valeCombustible::orderBy('created_at', 'desc')->get();
        $departamento = departamentos::all();
        $empleado = empleado::all();
        $user = User::all();
        $fechaActual = Carbon::now();
        return view('valeCombustible.index', compact('vale', 'departamento', 'empleado', 'user'));
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
        $registrerVale->valeAutorizo = '';

        $registrerVale->save();

        Mail::to('alonsomendez653@gmail.com')->send(new solicitudVale());
        Mail::to('aevo203@hotmail.com')->send(new solicitudVale());

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
        $ActualizarVale = valeCombustible::find($id);
        $estadoAnterior = $ActualizarVale->valeEstado;
        $ActualizarVale->valeEstado = $request->valeEstado;
        $ActualizarVale->valeAutorizo = $request->valeAutorizo;
        $ActualizarVale->save();

        if ($request->valeEstado === 'Aceptado' && $estadoAnterior !== 'Aceptado') {

            Mail::to('alonsomendez653@gmail.com')->send(new valeAceptado($request->valeEstado));
            Mail::to('aevo203@hotmail.com')->send(new valeAceptado($request->valeEstado));
        }

        return redirect('valeCombustible');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(valeCombustible $valeCombustible)
    {
        //
    }
}
