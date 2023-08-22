@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registro area') }}</div>
                    <p></p>
                    Vista Del Area
                    <p></p>
                    <label for="areaNombre">Nombre de la area: </label>
                    <input type="text"  placeholder="Escribe el nombre de la area" class="form-control" name="areaNombre"
                        id="areaNombre">

                    <label for="areaDepartamento">Area de Departamento: </label>
                    <select class="form-select" aria-label="Default select example" name="areaDepartamento" id="areaDepartamento">
                        @foreach ($departamento as $dato)
                            <option value="{{$dato->id}}">{{$dato->departamentoNombre}}</option>
                        @endforeach
                    </select>

                    <label for="areaDescripcion">Descripcion del area: </label>
                    <input type="text" placeholder="Descripcion" class="form-control" name="areaDescripcion"
                        id="areaDescripcion">

                    <input class="btn btn-primary" type="submit">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
