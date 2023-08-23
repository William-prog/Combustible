@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro Empleado</div>

                    <div class="card-body">
                        <div>
                            Vista Empleado</div>

                        <label for="empleadoNumero">Numero del empleado:</label>
                        <input type="text" placeholder="" class="form-control" name="empleadoNumero" id="empleadoNumero">

                        <label for="empleadoNombre">Nombre del empleado:</label>
                        <input type="text" placeholder="" class="form-control" name="empleadoNombre" id="empleadoNombre">

                        <label for="empleadoPuesto">Puesto del empleado:</label>
                        <input type="text" placeholder="" class="form-control" name="empleadoPuesto" id="empleadoPuesto">

                        <label for="empleadoDepartamento">Departamento del empleado:</label>
                        <select class="form-select" aria-label="Default select example" name="empleadoDepartamento" id="empleadoDepartamento">
                            @foreach ($depto as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->deptoName }}</option>
                            @endforeach
                        </select>


                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection