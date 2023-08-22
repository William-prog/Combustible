@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Vehiculo</div>

                    <div class="card-body">
                        <div>
                            Vista Vehiculo</div>

                        <label for="vehiculoEco">Numero economico:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoEco" id="vehiculoEco">

                        <label for="vehiculoPlacas">Placas del vehiculo:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoPlacas" id="vehiculoPlacas">

                        <label for="vehiculoModelo">Modelo del vehiculo:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoModelo" id="vehiculoModelo">

                        <label for="vehiculoMarca">Marca del vehiculo:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoMarca" id="vehiculoMarca">

                        <label for="vehiculoAño">Año del vehiculo:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoAño" id="vehiculoAño">

                        <label for="vehiculoCombustible">Combustible:</label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoCombustible" id="vehiculoCombustible">

                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection