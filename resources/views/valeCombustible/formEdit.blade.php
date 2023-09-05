@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Vale Vehiculo</div>

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

                    <div class="card-body">
                        <div>Datos del Vehiculo</div>

                        <label for="vehiculoEco">No.Economico: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoEco" id="vehiculoEco">

                        <label for="vehiculoPlacas">Placas: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoPlacas" id="vehiculoPlacas">

                        <label for="vehiculoCombustible">Combustible: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoCombustible"
                            id="vehiculoCombustible">

                        <label for="vehiculoMarca">Marca: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoMarca" id="vehiculoMarca">

                        <label for="vehiculoModelo">Modelo: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoModelo" id="vehiculoModelo">

                        <label for="vehiculoAño">Año: </label>
                        <input type="text" placeholder="" class="form-control" name="vehiculoAño" id="vehiculoAño">

                        <label for="kmKilometraje">Kilometraje: </label>
                        <input type="text" placeholder="" class="form-control" name="kmKilometraje" id="kmKilometraje">

                        <label for="valeLitros">Litros: </label>
                        <input type="text" placeholder="" class="form-control" name="valeLitros" id="valeLitros">

                        <label for="valeCantidad">Litros en letra: </label>
                        <input type="text" placeholder="" class="form-control" name="valeCantidad" id="valeCantidad">


                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const vehiculoEcoInput = document.getElementById('vehiculoEco');
        const vehiculoPlacasInput = document.getElementById('vehiculoPlacas');
        const vehiculoCombustibleInput = document.getElementById('vehiculoCombustible');
        const vehiculoMarcaInput = document.getElementById('vehiculoMarca');
        const vehiculoModeloInput = document.getElementById('vehiculoModelo');
        const vehiculoAñoInput = document.getElementById('vehiculoAño');
        const kmKilometrajeInput = document.getElementById('kmKilometraje');

        vehiculoEcoInput.addEventListener('input', function() {
            const vehiculoEco = vehiculoEcoInput.value;

            // Realizar solicitud AJAX para obtener datos del vehículo
            axios.get(`/obtener-datos-vehiculo/${vehiculoEco}`)
                .then(response => {
                    vehiculoPlacasInput.value = response.data.placas;
                    vehiculoCombustibleInput.value = response.data.combustible;
                    vehiculoMarcaInput.value = response.data.marca;
                    vehiculoModeloInput.value = response.data.modelo;
                    vehiculoAñoInput.value = response.data.año;
                })
                .catch(error => {
                    console.error(error);
                });

            // Realizar solicitud AJAX para obtener el último kilómetraje registrado
            axios.get(`/obtener-ultimo-kilometraje/${vehiculoEco}`)
                .then(response => {
                    kmKilometrajeInput.value = response.data.kilometraje;
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection
