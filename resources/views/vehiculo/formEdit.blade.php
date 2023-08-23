@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Vehiculo</div>

                    <div class="card-body">
                        <div>
                            Vista Vechiculo</div>

                        <label for="vehiculoEco">Numero economico:</label>
                        <input type="text" value="{{ $dato->vehiculoEco }}" placeholder="" class="form-control"
                            name="vehiculoEco" id="vehiculoEco">

                        <label for="vehiculoPlacas">Placas del vehiculo:</label>
                        <input type="text" value="{{ $dato->vehiculoPlacas }} placeholder=" class="form-control"
                            name="vehiculoPlacas" id="vehiculoPlacas">

                        <label for="vehiculoModelo">Modelo del vehiculo:</label>
                        <input type="text" value="{{ $dato->vehiculoModelo }} placeholder=" class="form-control"
                            name="vehiculoModelo" id="vehiculoModelo">

                        <label for="vehiculoMarca">Marca del vehiculo:</label>
                        <input type="text" value="{{ $dato->vehiculoMarca }} placeholder=" class="form-control"
                            name="vehiculoMarca" id="vehiculoMarca">

                        <label for="vehiculoAño">Año del vehiculo:</label>
                        <input type="text" value="{{ $dato->vehiculoAño }} placeholder=" class="form-control"
                            name="vehiculoAño" id="vehiculoAño">

                        <label for="vehiculoCombustible">Combustible:</label>
                        <input type="text" value="{{ $dato->vehiculoCombustible }} placeholder=" class="form-control"
                            name="vehiculoCombustible" id="vehiculoCombustible">

                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
