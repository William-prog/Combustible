@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Vale de carga</div>

                    <div class="card-body">
                        <div> Datos del solicitante</div>

                        <label for="valeFecha">Fecha:</label>
                        <input type="date" id="valeFecha" name="valeFecha">

                        <label for="valeNumero">Numero del empleado: </label>
                        <input type="text"value="{{ $dato->valeNumero }}" placeholder="" class="form-control"
                            name="valeNumero" id="valeNumero">

                        <label for="valeSolicitante">Solicitante: </label>
                        <input type="text" value="{{ $dato->valeSolicitante }}" placeholder="" class="form-control"
                            name="valeSolicitante" id="valeSolicitante">

                        <label for="valeDepartamento">Departamento del empleado: </label>
                        <select class="form-select" aria-label="Default select example" name="valeDepartamento"
                            id="valeDepartamento">
                            @foreach ($departamento as $datoDepartamento)
                                <option value="{{ $datoDepartamento->id }}">{{ $datoDepartamento->departamentoNombre }}</option>
                            @endforeach
                        </select>

                        <label for="valeArea">Area: </label>
                        <select class="form-select" aria-label="Default select example" name="valeArea"
                            id="valeArea">
                            @foreach ($departamento as $datoDepartamento)
                                <option value="{{ $datoDepartamento->id }}">{{ $datoDepartamento->departamentoNombre }}</option>
                            @endforeach
                        </select>

                        <label for="valeCc">C.C: </label>
                        <select class="form-select" aria-label="Default select example" name="valeCc"
                            id="valeCc">
                            @foreach ($departamento as $datoDepartamento)
                                <option value="{{ $datoDepartamento->id }}">{{ $datoDepartamento->departamentoNombre }}</option>
                            @endforeach
                        </select>


                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
