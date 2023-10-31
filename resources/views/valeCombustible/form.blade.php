
@extends('layouts.app')
@section('content')
<style>
    .container {
        /* Cambiamos el fondo a negro */
        background: rgba(0, 0, 0, 0.24);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(9.7px);
        -webkit-backdrop-filter: blur(9.7px);
        border: 2px solid rgba(255, 255, 255, 0.47);
        color: white;
    }

    /* Estilo para los títulos h4, h5 y h6 dentro del contenedor */
    .container h4,
    .container h5,
    .container h6 {
        color: white;
    
    }

    .logo-image {
        position: absolute;
        top: 50px;
        right: 40px;
        max-width: 30px;
        /* Ajusta el ancho máximo según tus necesidades */
        height: auto;
    }

    .container img {
        max-width: 20%;
        height: auto;
        display: block;

    }
</style>
<div class="container">
    <img src="/css/LogoBlanco.png" alt="Logo" class="logo-image">
    <div class="row justify-content-center">
        <link rel="stylesheet" href="estilos.css">
        <div class="row mt-3">
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
        <fieldset>
            <h5 class="row mt-3"></h5>
            <h5>Solicitante</h5>
            <hr>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <label for="valeNumero" class="form-label">No. empleado:</label>
                        <input type="number" class="form-control" placeholder="" id="valeNumero" name="valeNumero"required>
                    </div>
                    <div class="col-md-6">
                        <label for="valeSolicitante" class="form-label">Solicitante:</label>
                        <input type="text" placeholder="" class="form-control" name="valeSolicitante" id="valeSolicitante"required>
                    </div>
                    <div class="col-md-4">
                        <label for="valeFecha" class="form-label">Fecha:</label>
                        <input type="date" class="form-control" value="{{ $fechaActual->format('Y-m-d') }}" id="valeFecha" name="valeFecha" readonly required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="valeDepartamento">Departamento:</label>
                        <select class="form-select" aria-label="Default select example" name="valeDepartamento" id="choice1"required>
                            @foreach ($departamento as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valeArea">Area:</label>
                        <select class="form-select" aria-label="Default select example" name="valeArea" id="choice2">
                            @foreach ($area as $datoA)
                            <option data-option="{{ $datoA->areaDepartamento }}" value="{{ $datoA->areaNombre }}">
                                {{ $datoA->areaNombre }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="valeCc">C.C:</label>
                        <input type="number" class="form-control" placeholder="" name="valeCc" id="valeCc" readonly>
                    </div>
                </div>
            </div>
    </div>
    <hr>

    <div class="row mt-4">
        <h5>Datos del Vehículo</h5>
        <hr>
        <div class="col-md-2">
            <label for="valeEconomico" class="form-label">No. economico:</label>
            <input type="number" placeholder="" class="form-control" name="valeEconomico" id="valeEconomico"required>
        </div>
        <div class="col-md-2">
            <label for="valePlacas" class="form-label">Placas:</label>
            <input type="text" placeholder="" class="form-control" name="valePlacas" id="valePlacas"required>
        </div>
        <div class="col-md-6">
            <label for="valeModelo" class="form-label">Modelo:</label>
            <input type="text" placeholder="" class="form-control" name="valeModelo" id="valeModelo"required>
        </div>
        <div class="col-md-2">
            <label for="valeCombustible" class="form-label">Combustible:</label>
            <input type="text" placeholder="" class="form-control" name="valeCombustible" id="valeCombustible"required>

        </div>
    </div>

    <div class="row mt-3">

        <div class="col-md-2">
            <label for="valeMarca" class="form-label">Marca:</label>
            <input type="text" placeholder="" class="form-control" name="valeMarca" id="valeMarca"required>
        </div>
        <div class="col-md-2">
            <label for="valeAño" class="form-label">Año:</label>
            <input type="number" placeholder="" class="form-control" name="valeAño" id="valeAño"required>

        </div>
        <div class="col-md-2">
            <label for="valeKilometraje" class="form-label">Kilometraje:</label>
            <input type="number" placeholder="" class="form-control" name="valeKilometraje" id="valeKilometraje"required>
        </div>
        <div class="col-md-2">
            <label for="valeLitros" class="form-label">Litros:</label>
            <input type="number" placeholder="" class="form-control" name="valeLitros" id="valeLitros"required>

        </div>
        <div class="col-md-4">
            <label for="valeCantidad" class="form-label">Cantidad:</label>
            <input type="text" placeholder="" class="form-control" name="valeCantidad" id="valeCantidad" readonly required>
        </div>
    </div>
    <hr>
    <div class="mb-3 text-center mt-3">
        <button type="submit" class="btn btn-success">Solicitar</button>
    </div>
</div>

<script>
    function numberToWords(number) {

        var words = ["", "Uno Litros", "Dos Litros", "Tres Litros", "Cuatro Litros", "Cinco Litros", "Seis Litros", "Siete Litros", "Ocho Litros", "Nueve Litros", "Diez Litros", "Once Litros",
            "Doce Litros", "Trece Litros", "Catorce Litros", "Quince Litros", "Dieciséis Litros", "Diecisiete Litros", "Dieciocho Litros", "Diecinueve Litros"
        ];

        // Nombres letras
        var tens = ["", "", "Veinte Litros", "Treinta Litros", "Cuarenta Litros", "Cincuenta Litros", "Sesenta Litros", "Setenta Litros", "Ochenta Litros", "Noventa Litros"];
        if (number <= 0) {
            return "Cero";
        }
        if (number < 20) {
            return words[number];
        }

        var digit = number % 10;
        var ten = Math.floor(number / 10);

        var result = tens[ten];
        if (digit > 0) {
            result += " y " + words[digit];
        }

        return result;
    }

    function updateAmountInWords() {
        var litros = parseFloat(document.getElementById("valeLitros").value);
        var cantidad = numberToWords(litros);
        document.getElementById("valeCantidad").value = cantidad;
    }

    // Actualiza "valeCantidad"
    document.getElementById("valeLitros").addEventListener("change", updateAmountInWords);
</script>



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
@endsection