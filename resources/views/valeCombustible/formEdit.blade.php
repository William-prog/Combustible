@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <link rel="stylesheet" href="public\css\estilos.css">
            <div class="row mt-3">
                <div class="col-md-8">
                    <h4>Servicios y Equipos Topo S.A de C.V</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Carretera a Valdecañas km 1.5 S/N Col.La Paz; C.P.99080</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Fresnillo, Zacatecas., México. Tel.492-134-0253</h5>
                </div>
            </div>
            <hr>
            <h5 class="row mt-3" class="contenedor-titulo"></h5>
            <h5>Solicitante</h5>
            <hr>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label for="valeNumero" class="form-label">No.Empleado:</label>
                        <input type="number" value="{{ $dato->valeNumero }}" class="form-control" placeholder=""
                            id="valeNumero" name="valeNumero" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="valeSolicitante" class="form-label">Solicitante:</label>
                        <input type="text" value="{{ $dato->valeSolicitante }}" placeholder="" class="form-control"
                            name="valeSolicitante" id="valeSolicitante" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="valeFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" value="{{ $dato->valeFecha }}" id="valeFecha"
                            name="valeFecha" readonly>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="valeDepartamento">Departamento:</label>
                        @foreach ($departamento as $datoDepartamento)
                            @if ($datoDepartamento->id == $dato->valeDepartamento)
                                <input type="text" class="form-control"
                                    value="{{ $datoDepartamento->departamentoNombre }}" id="valeDepartamento"
                                    name="valeDepartamento" readonly>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label for="valeArea">Area:</label>
                        <input type="text" class="form-control" value="{{ $dato->valeArea }}" id="valeArea"
                            name="valeArea" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="valeCc">C.C:</label>
                        <input type="number" value="{{ $dato->valeCc }}" class="form-control" placeholder="" name="valeCc"
                            id="valeCc" readonly>
                    </div>
                </div>
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
        @if ($dato->valeEstado == 'Pendiente')
            <div class="row mt-3 mt-5">
                <div class="col-md-6">
                    <div>
                        <input type="radio" id="Aceptar" name="valeEstado" value="Aceptado">
                        <a class="btn btn-success">Aceptar</a>
                        <input type="radio" id="Rechazar" name="valeEstado" value="Rechazado">
                        <a class="btn btn-danger">Rechazar</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <button id="btnConfirmar" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        @elseif ($dato->valeEstado == 'Aceptado')
            <a class="btn btn-success">El vale fue aceptado</a>
        @elseif ($dato->valeEstado == 'Rechazado')
            <a class="btn btn-danger">El vale fue rechazado</a>
        @endif
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnConfirmar").on("click", function() {
                var nuevoEstado = $('input[name="valeEstado"]:checked').val();

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
                            alert("El vale fue aceptado");
                        } else if (response === 'Rechazado') {
                            alert("El vale fue rechazado");
                        } else {
                            alert("Error al actualizar el estado.");
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error("Error en la solicitud AJAX: " + textStatus);
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
