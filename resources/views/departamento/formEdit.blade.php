@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Departamentos') }}</div>
                <p></p>
                Vista Departamentos Edicion
                <p></p>
               <label for="departamentoNombre">Nombre del departamento: </label>
               <input type="text" value="{{$dato->departamentoNombre}}" placeholder="Escribe el nuevo departamento" class="form-control" name="departamentoNombre" id="departamentoNombre">
               
               <label for="departamentoCC">Departamento de Centro de Costos: </label>
               <input type="text" value="{{$dato->departamentoCC}}" placeholder="Departamento centro de costos" class="form-control" name="departamentoCC" id="departamentoCC">

               <label for="departamentoDescripcion">Descripcion del departamento: </label>
               <input type="text" value="{{$dato->departamentoDescripcion}}" placeholder="Descripcion" class="form-control" name="departamentoDescripcion" id="departamentoDescripcion">

               <label for="deptoArea">Area: </label>
               

               <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea1" value="set" autocomplete="on" checked>
                <label class="btn btn-outline-primary" for="departamentoArea1">Set</label>
              
                <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea2" value="operacion" autocomplete="on">
                <label class="btn btn-outline-primary" for="departamentoArea2">Operacion</label>
              
                <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea3" value="ambas" autocomplete="on">
                <label class="btn btn-outline-primary" for="departamentoArea3">Ambas</label>
              </div>
              <input class="btn btn-primary" type="submit">
              
            </div>

        </div>
    </div>
</div>
@endsection