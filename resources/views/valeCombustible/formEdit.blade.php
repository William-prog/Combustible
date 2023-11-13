<style>
    .image-container {
        padding: 5px;
        position: absolute;
        top: 20px;
        right: 30px;
        max-width: 300px;
        /* Ajusta el ancho máximo según tus necesidades */
        height: 80px;
    }

    .image-container img {
        max-width: 90%;
        /* Asegura que la imagen no sea más ancha que el contenedor */
        max-height: 90%;
        /* Asegura que la imagen no sea más alta que el contenedor */
    }
    .h5{
        font-weight: bold;

    }
</style>

<div class="row justify-content-end ">
    <div class="col-md-4 text-center">
        <div class="image-container">
            <img src="/css/topo-logo.png" alt="Logo">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h4>Servicios y Equipos Topo S.A de C.V</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6>Carretera a Valdecañas km 1.5 S/N Col.La Paz; C.P.99080</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h6>Fresnillo, Zacatecas., México. Tel.492-134-0253</h6>
        </div>
    </div>
    <h5 class="row mt-3">Solicitante</h5>
    <hr>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2">
                <label for="valeNumero" class="form-label">No.empleado:</label>
                <input type="number" value="{{ $datoSolicitante->valeNumero }}" class="form-control" placeholder="" id="valeNumero" name="valeNumero" readonly>
            </div>
            <div class="col-md-6">
                <label for="valeSolicitante" class="form-label">Solicitante:</label>
                <input type="text" value="{{ $datoSolicitante->valeSolicitante }}" placeholder="" class="form-control" name="valeSolicitante" id="valeSolicitante" readonly>
            </div>
            <div class="col-md-4">
                <label for="valeFecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" value="{{ $datoSolicitante->valeFecha }}" id="valeFecha" name="valeFecha" readonly>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <label for="valeDepartamento">Departamento:</label>
                @foreach ($departamento as $datoDepartamento)
                @if ($datoSolicitante->valeDepartamento == $datoDepartamento->id)
                <input type="text" value=" {{ $datoDepartamento->departamentoNombre }}" class="form-control" name="valeDepartamento" id="valeDepartamento" readonly>
                @endif
                @endforeach
            </div>
            <div class="col-md-4">
                <label for="valeArea">Area:</label>
                <input type="text" value="{{ $datoSolicitante->valeArea }}" placeholder="" class="form-control" name="valeArea" id="valeArea" readonly>
            </div>
            <div class="col-md-2">
                <label for="valeCc">C.C:</label>
                <input type="number" value="{{ $datoSolicitante->valeCc }}" class="form-control" placeholder="" name="valeCc" id="valeCc" readonly>
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
        <input type="number" value="{{ $datoSolicitante->valeEconomico }}" placeholder="" class="form-control" name="valeEconomico" id="valeEconomico" readonly>
    </div>
    <div class="col-md-2">
        <label for="valePlacas" class="form-label">Placas:</label>
        <input type="text" value="{{ $datoSolicitante->valePlacas }}" placeholder="" class="form-control" name="valePlacas" id="valePlacas" readonly>
    </div>
    <div class="col-md-6">
        <label for="valeModelo" class="form-label">Modelo:</label>
        <input type="text" value="{{ $datoSolicitante->valeModelo }}" placeholder="" class="form-control" name="valeModelo" id="valeModelo" readonly>
    </div>
    <div class="col-md-2">
        <label for="valeCombustible" class="form-label">Combustible:</label>
        <input type="text" value="{{ $datoSolicitante->valeCombustible }}" placeholder="" class="form-control" name="valeCombustible" id="valeCombustible" readonly>

    </div>
</div>

<div class="row mt-3">

    <div class="col-md-2">
        <label for="valeMarca" class="form-label">Marca:</label>
        <input type="text" value="{{ $datoSolicitante->valeMarca }}" placeholder="" class="form-control" name="valeMarca" id="valeMarca" readonly>
    </div>
    <div class="col-md-2">
        <label for="valeAño" class="form-label">Año:</label>
        <input type="number" value="{{ $datoSolicitante->valeAño }}" placeholder="" class="form-control" name="valeAño" id="valeAño" readonly>

    </div>
    <div class="col-md-2">
        <label for="valeKilometraje" class="form-label">Kilometraje:</label>
        <input type="number" value="{{ $datoSolicitante->valeKilometraje }}" placeholder="" class="form-control" name="valeKilometraje" id="valeKilometraje" readonly>
    </div>
    <div class="col-md-2">
        <label for="valeLitros" class="form-label">Litros:</label>
        <input type="number" value="{{ $datoSolicitante->valeLitros }}" placeholder="" class="form-control" name="valeLitros" id="valeLitros" readonly>

    </div>
    <div class="col-md-4">
        <label for="valeCantidad" class="form-label">Litros en letra:</label>
        <input type="text" value="{{ $datoSolicitante->valeCantidad }}" placeholder="" class="form-control" name="valeCantidad" id="valeCantidad" readonly>
    </div>
    <input type="hidden" id="valeAutorizo" name="valeAutorizo" value="{{ Auth::user()->name }}">

</div>

<!-- En la vista con el código para cambiar el estado -->
<div class="row text-center">
    @if ($datoSolicitante->valeEstado == 'Pendiente')
    <!-- Mostrar solo los cambios Aceptar/Rechazar -->
    <div class="col-md-12 mt-4">
        <div>
            <input type="radio" id="aceptarRadio" name="valeEstado" value="Aceptado">
            <label for="aceptarRadio" class="btn btn-primary">Aceptar</label>
            <input type="radio" id="rechazarRadio" name="valeEstado" value="Rechazado">
            <label for="rechazarRadio" class="btn btn-danger">Rechazar</label>
        </div>
    </div>
    <br><br>
    <div class="text-center text-primary mt-4">
        <button id="btnConfirmar" class="btn btn-success">Confirmar</button>
    </div>
    <!-- Mensaje de confirmación -->
    <div class="col-md-12 mt-3">
        <div id="mensajeConfirmacion" style="display: none;"></div>
    </div>
    @endif
</div>

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
        });
    });
</script>