@extends('layouts.app')
@section('content')
    <div class="container">
        <!-- ... Tu contenido anterior ... -->

        <div class="row mt-3 mt-5">
            <div class="col-md-6">
                <div>
                    <input type="radio" id="aceptarRadio" name="valeEstado" value="Aceptado">
                    <label for="aceptarRadio">Aceptar</label>
                    <input type="radio" id="rechazarRadio" name="valeEstado" value="Rechazado">
                    <label for="rechazarRadio">Rechazar</label>
                </div>
            </div>
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
                            $("#mensajeConfirmacion").html("El vale fue aceptado").addClass("alert alert-success").show();
                            // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                        } else if (response === 'Rechazado') {
                            $("#mensajeConfirmacion").html("El vale fue rechazado").addClass("alert alert-danger").show();
                            // Puedes agregar aquí lógica adicional para actualizar la interfaz según el nuevo estado.
                        } 
                    },
            
                });
            });
        });
    </script>
@endsection
