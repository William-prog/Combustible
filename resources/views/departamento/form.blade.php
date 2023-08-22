@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro Departamento') }}</div>
                    <p></p>
                    Vista Departamento
                    <p></p>
                    <label for="departamentoNombre">Nombre del departamento: </label>
                    <input type="text" placeholder="Escribe el departamento" class="form-control" name="departamentoNombre"
                        id="departamentoNombre">

                    <label for="departamentoCC">Departamento cc: </label>
                    <input type="text" placeholder="Departamento CC" class="form-control" name="departamentoCC" id="departamentoCC">

                    <label for="departamentoDescripcion">Descripcion del departamento: </label>
                    <input type="text" placeholder="Descripcion del departamento" class="form-control"
                        name="departamentoDescripcion" id="departamentoDescripcion">

                    <label for="departamentoArea">Area: </label>

                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea1" value="Set" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="departamentoArea1">Set</label>

                        <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea2" value="Operacion" autocomplete="off">
                        <label class="btn btn-outline-primary" for="departamentoArea2">Operacion</label>

                        <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea3" value="Ambas" autocomplete="off">
                        <label class="btn btn-outline-primary" for="departamentoArea3">Ambas</label>
                    </div>

                    <input class="btn btn-primary" type="submit">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
