<<<<<<< HEAD
<!-- En la vista con el código para cambiar el estado -->
<div class="row">
    <div class="col-md-6">
        <div >
            <input type="radio"  id="aceptarRadio" name="valeEstado" value="Aceptado">
            <label for="aceptarRadio">Aceptar</label>
            <input type="radio" id="rechazarRadio" name="valeEstado" value="Rechazado">
            <label for="rechazarRadio">Rechazar</label>
        </div>
    </div>
    <br><br>
    <div class="text-center text-primary">
        <button id="btnConfirmar" class="btn btn-primary" disabled>Confirmar</button>
    </div>
</div>
=======
@extends('layouts.app')
@section('content')
    <div class="container">
<<<<<<< HEAD
        <!-- ... Tu contenido anterior ... -->

        <div class="row mt-3 mt-5">
            <div class="col-md-6">
                <div>
                    <input type="radio" id="aceptarRadio" name="valeEstado" value="Aceptado">
                    <label for="aceptarRadio">Aceptar</label>
                    <input type="radio" id="rechazarRadio" name="valeEstado" value="Rechazado">
                    <label for="rechazarRadio">Rechazar</label>
=======
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
>>>>>>> 88177760f9a46093ca139779af4e20ce89de9aeb
                </div>
        </div>
        <hr>
        <div class="row mt-4">
            <h5>Datos del Vehículo</h5>
            <hr>
            <div class="col-md-2">
                <label for="valeEconomico" class="form-label">No.Economico:</label>
                <input type="number" value="{{ $dato->valeEconomico }}" placeholder="" class="form-control"
                    name="valeEconomico" id="valeEconomico" readonly>
            </div>
<<<<<<< HEAD
=======
            <div class="col-md-2">
                <label for="valePlacas" class="form-label">Placas:</label>
                <input type="number" value="{{ $dato->valePlacas }}" placeholder="" class="form-control" name="valePlacas"
                    id="valePlacas" readonly>
            </div>
            <div class="col-md-6">
                <label for="valeModelo" class="form-label">Modelo:</label>
                <input type="text" value="{{ $dato->valeModelo }}" placeholder="" class="form-control" name="valeModelo"
                    id="valeModelo" readonly>
            </div>
            <div class="col-md-2">
                <label for="valeCombustible" class="form-label">Combustible:</label>
                <input type="text" value="{{ $dato->valeCombustible }}" placeholder="" class="form-control"
                    name="valeCombustible" id="valeCombustible" readonly>
            </div>
        </div>
        <div class="row mt-3">

            <div class="col-md-2">
                <label for="valeMarca" class="form-label">Marca:</label>
                <input type="text" value="{{ $dato->valeMarca }}" placeholder="" class="form-control"
                    name="valeMarca" id="valeMarca" readonly>
            </div>
            <div class="col-md-2">
                <label for="valeAño" class="form-label">Año:</label>
                <input type="number" value="{{ $dato->valeAño }}" placeholder="" class="form-control" name="valeAño"
                    id="valeAño" readonly>

            </div>
            <div class="col-md-2">
                <label for="valeKilometraje" class="form-label">Kilometraje:</label>
                <input type="number" value="{{ $dato->valeKilometraje }}" placeholder="" class="form-control"
                    name="valeKilometraje" id="valeKilometraje" readonly>
            </div>
            <div class="col-md-2">
                <label for="valeLitros" class="form-label">Litros:</label>
                <input type="number" value="{{ $dato->valeLitros }}" placeholder="" class="form-control"
                    name="valeLitros" id="valeLitros" readonly>

            </div>
            <div class="col-md-4">
                <label for="valeCantidad" class="form-label">Litros en letra:</label>
                <input type="text" value="{{ $dato->valeCantidad }}" placeholder="" class="form-control"
                    name="valeCantidad" id="valeCantidad" readonly>
            </div>
        </div>
        <hr>
        <div>
            <input type="radio" name="valeEstado" id="valeEstado" value="Aceptado">Aceptar
            <input type="radio" name="valeEstado" id="valeEstado" value="Rechazado">Rechazar
        </div>
        <div>
            <input type="submit" value="confirmar">
        </div>
        <hr>
        <div class="row mt-4">
            <h5>Datos del Vehículo</h5>
            <hr>
            <div class="col-md-2">
                <label for="valeEconomico" class="form-label">No.Economico:</label>
                <input type="number" value="{{ $dato->valeEconomico }}" placeholder="" class="form-control"
                    name="valeEconomico" id="valeEconomico" readonly>
            </div>
            <div class="col-md-2">
                <label for="valePlacas" class="form-label">Placas:</label>
                <input type="number" value="{{ $dato->valePlacas }}" placeholder="" class="form-control" name="valePlacas"
                    id="valePlacas" readonly>
            </div>
>>>>>>> 88177760f9a46093ca139779af4e20ce89de9aeb
            <div class="col-md-6">
                <button id="btnConfirmar" class="btn btn-primary" disabled>Confirmar</button>
            </div>
        </div>

        <!-- Mensaje de confirmación -->
        <div class="row mt-3">
            <div class="col-md-12">
                <div id="mensajeConfirmacion" style="display: none;"></div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("input[name='valeEstado']").change(function() {
                if ($("#aceptarRadio").is(":checked") || $("#rechazarRadio").is(":checked")) {
                    $("#btnConfirmar").prop("disabled", false);
                } else {
                    $("#btnConfirmar").prop("disabled", true);
                }
            });
>>>>>>> 1b2fce05d6b6675522839d6b5dd46e4f07a87c8c

<!-- Mensaje de confirmación -->
<div class="row mt-3">
    <div class="col-md-12">
        <div id="mensajeConfirmacion" style="display: none;"></div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("input[name='valeEstado']").change(function() {
            if ($("#aceptarRadio").is(":checked") || $("#rechazarRadio").is(":checked")) {
                $("#btnConfirmar").prop("disabled", false);
            } else {
                $("#btnConfirmar").prop("disabled", true);
            }
        });

<<<<<<< HEAD
        $("#btnConfirmar").on("click", function() {
            var nuevoEstado = $('input[name="valeEstado"]:checked').val();
            var valeId = $("input[name='valeEstado']:checked").data("vale-id");

            $.ajax({
                type: "POST",
                url: "{{ route('valeCombustible.update', ['id' => ':valeId']) }}".replace(':valeId', valeId),
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    valeEstado: nuevoEstado
                },
                success: function(response) {
                    if (response === 'Aceptado') {
                        $("#mensajeConfirmacion").html("El vale fue aceptado").addClass(
                            "alert alert-success").show();
                        // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                    } else if (response === 'Rechazado') {
                        $("#mensajeConfirmacion").html("El vale fue rechazado").addClass(
                            "alert alert-danger").show();
                        // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                    }
                },
            });
=======
                $.ajax({
                    type: "POST",
                    url: "{{ route('valeCombustible.update', ['id' => $dato->id]) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "PUT",
                        valeEstado: nuevoEstado
                    },
                    success: function(response) {
                        if (response === 'Aceptado') {
                            $("#mensajeConfirmacion").html("El vale fue aceptado").addClass("alert alert-success").show();
                            // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                        } else if (response === 'Rechazado') {
                            $("#mensajeConfirmacion").html("El vale fue rechazado").addClass("alert alert-danger").show();
                            // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                        } 
                    },
            
=======

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
>>>>>>> 88177760f9a46093ca139779af4e20ce89de9aeb
                });
>>>>>>> 1b2fce05d6b6675522839d6b5dd46e4f07a87c8c
        });
    });
</script>
