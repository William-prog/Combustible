@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Datos del Solicitante</div>
                    <div class="card-body">
                        <label for="valeFecha">Fecha: {{ $fechaActual->format('d/m/Y') }}</label><br>

                        <label for="valeNumero">No.Empleado:</label>
                        <input type="text" placeholder="" class="form-control" name="valeNumero" id="valeNumero">

                        <label for="valeSolicitante">Solicitante:</label>
                        <input type="text" placeholder="" class="form-control" name="valeSolicitante"
                            id="valeSolicitante">

                        <label for="valeDepartamento">Departamento:</label>
                        <select class="form-select" aria-label="Default select example" name="valeDepartamento"
                            id="choice1">
                            @foreach ($departamento as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>

                        <label for="valeArea">Area:</label>
                        <select class="form-select" aria-label="Default select example" name="valeArea" id="choice2">
                            @foreach ($area as $datoA)
                                <option data-option="{{ $datoA->areaDepartamento }}" value="{{ $datoA->areaNombre }}">
                                    {{ $datoA->areaNombre }}
                                </option>
                            @endforeach
                        </select>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <script>
                            function filter_options() {
                                if (typeof $("#choice1").data('options') === "undefined") {
                                    $("#choice1").data('options', $('#choice2 option').clone());
                                }
                                var id = $("#choice1").val();
                                var options = $("#choice1").data('options').filter('[data-option=' + id + ']');
                                $('#choice2').html(options);
                            }

                            $(function() {
                                //Ejecutar el filtro la primera vez
                                filter_options();

                                //actualizar al cambiar el factor
                                $("#choice1").change(function() {
                                    filter_options();
                                });
                            });
                        </script>

                        <label for="valeCc">C.C:</label>
                        <input type="text" placeholder="" class="form-control" name="valeCc" id="valeCc" readonly>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Datos del Vehículo</div>
                    <div class="card-body">
                        <label for="valeEconomico">No.Economico:</label>
                        <input type="text" placeholder="" class="form-control" name="valeEconomico" id="valeEconomico">

                        <label for="valePlacas">Placas:</label>
                        <input type="text" placeholder="" class="form-control" name="valePlacas" id="valePlacas">

                        <label for="valeCombustible">Combustible:</label>
                        <input type="text" placeholder="" class="form-control" name="valeCombustible"
                            id="valeCombustible">

                        <label for="valeMarca">Marca:</label>
                        <input type="text" placeholder="" class="form-control" name="valeMarca" id="valeMarca">

                        <label for="valeModelo">Modelo:</label>
                        <input type="text" placeholder="" class="form-control" name="valeModelo" id="valeModelo">

                        <label for="valeAño">Año:</label>
                        <input type="text" placeholder="" class="form-control" name="valeAño" id="valeAño">

                        <label for="kmKilometraje">Kilometraje:</label>
                        <input type="text" placeholder="" class="form-control" name="kmKilometraje" id="kmKilometraje">

                        <label for="valeLitros">Litros:</label>
                        <input type="text" placeholder="" class="form-control" name="valeLitros" id="valeLitros">

                        <label for="valeCantidad">Litros en letra:</label>
                        <input type="text" placeholder="" class="form-control" name="valeCantidad" id="valeCantidad">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
