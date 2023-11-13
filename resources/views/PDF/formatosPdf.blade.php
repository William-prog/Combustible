<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }
</style>


<table width="60%" border="0" cellpadding="0" cellspacing="1" bordercolor="#000000" style="margin-left: 20%; margin-right: 20%; border-collapse:collapse; border-color:#ddd; vertical-align:text-top;">
    <tr style="background-color: #A5A8B1;">
        <td style="border-right: 1px solid #A5A8B1; padding-top: 5px; text-align: center;" class="image-container">
            <strong style="font-size: 18px;">
                VALE DE COMBUSTIBLE
            </strong>
        </td>
        <td style="width: 10%; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; padding-right: 10px; border-left: 1px solid #A5A8B1;">
        </td>
    </tr>
</table>

<br>

<table width="60%" border="0" cellpadding="0" cellspacing="1" bordercolor="#000000" style="margin-left: 20%; margin-right: 20%; border-collapse:collapse; border-color:#ddd; vertical-align:text-top;">
    <tr>
        <td style="width: 60%; border-right: 0px solid #A5A8B1;" class="image-container">
            <strong>
                Servicios y Equipos Topo S.A de C.V <br>
                Carretera a Valdecañas km 1.5 km <br>
                Col La Paz, C.P 9990 <br>
                Fresnillo, Zacatecas, Mexico <br>
                Tel: 492 134 02 83
            </strong>
        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 30px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            Fecha:
        </td>
        <td style="width: 30%; padding-top: 0px; padding-left: 10px; padding-bottom: 30px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            <div style="background-color: white; border: 1px solid black; height: 2%; text-align: center; padding-top: 10%;">
                {{$registro->valeFecha}}
            </div>
        </td>
    </tr>
</table>

<br>

<table width="60%" border="0" cellpadding="0" cellspacing="1" bordercolor="#000000" style="margin-left: 20%; margin-right: 20%; border-collapse:collapse; border-color:#ddd; vertical-align:text-top;">
    <tr>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-right: 0px solid #A5A8B1;" class="image-container">
            Solicitante:
        </td>
        <td style="width: 30%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="font-size: 8px; background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 4%; padding-bottom: 4%;">
                {{$registro->valeSolicitante}}
            </div>
        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            Vehículo:
        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            No. Economico:
        </td>
        <td style="width: 40%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 5%; padding-bottom: 5%;">
                {{$registro->valeEconomico}}
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-right: 0px solid #A5A8B1;" class="image-container">
            Departamento:
        </td>
        <td style="width: 30%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="font-size: 8px;  background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 4%; padding-bottom: 4%;">

                @foreach ($departamento as $datoDepartamento)
                @if ($registro->valeDepartamento == $datoDepartamento->id)
                {{$datoDepartamento->departamentoNombre}}
                @endif
                @endforeach

            </div>
        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">

        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            Placas:
        </td>
        <td style="width: 40%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 5%; padding-bottom: 5%;">
                {{$registro->valePlacas}}
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-right: 0px solid #A5A8B1;" class="image-container">
            C.C.:
        </td>
        <td style="width: 30%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 4%; padding-bottom: 4%;">
                {{$registro->valeCc}}
            </div>
        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">

        </td>
        <td style="width: 10%; padding-top: 0px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            Kilometraje:
        </td>
        <td style="width: 40%; padding-top: 0px; padding-left: 0px; padding-bottom: 0px; padding-right: 0px; border-left: 0px solid #A5A8B1;">
            <div style="background-color: white; border: 1px solid black; height: 1%; text-align: center; padding-top: 5%; padding-bottom: 5%;">
                {{$registro->valeKilometraje}}
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="0" style="width: 10%; padding-top: 1px; padding-left: 10px; padding-bottom: 0px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            M/M/A:
        </td>
        <td colspan="5" style="width: 10%;">
            <div style="background-color: white; border: 1px solid black; height: 1%; text-align: left; padding-left: 5px; padding-top: 1%; padding-bottom: 2%;">
                {{$registro->valeMarca}} / {{$registro->valeModelo}} / {{$registro->valeAño}}
            </div>
        </td>
    </tr>
</table>

<br>

<table width="60%" border="2" cellpadding="0" cellspacing="1" bordercolor="#000000" style="margin-left: 20%; margin-right: 20%; border-collapse:collapse; border-color:#000; vertical-align:text-top;">
    <tr style="background-color: black; color: white; text-align: center;">
        <td style="width: 20%; border-right: 1px solid #fff;" class="image-container">
            <strong>
                IMPORTE EN LITROS
            </strong>
        </td>
        <td style="width: 60%; border-right: 1px solid #fff;" class="image-container">
            <strong>
                CANTIDAD EN LETRA
            </strong>
        </td>
        <td style="width: 20%; padding-top: 0px; padding-left: 10px; padding-bottom: 30px; padding-right: 10px; border-left: 0px solid #A5A8B1;">

        </td>
    </tr>
    <tr style="text-align: center;">
        <td style="width: 20%; border-right: 1px solid #000;" class="image-container">
            <strong>
                {{$registro->valeLitros}}
            </strong>
        </td>
        <td style="width: 60%; border-right: 1px solid #000;" class="image-container">
            <strong>
                {{$registro->valeCantidad}}
            </strong>
        </td>
        <td style="width: 20%; padding-top: 5px; padding-left: 10px; padding-bottom: 5px; padding-right: 10px; border-left: 0px solid #A5A8B1;">
            <strong>
                {{$registro->valeCombustible}}
            </strong>
        </td>
    </tr>
    <tr style="text-align: center;">
    </tr>
</table>
<table width="60%" border="2" cellpadding="0" cellspacing="1" bordercolor="#000000" style="margin-top: 0%; margin-left: 20%; margin-right: 20%; border-collapse:collapse; border-color:#000; vertical-align:text-top;">
    <tr style="text-align: center;">
        <td style="height: 5%; width: 22%; border-right: 2px solid #000;" class="image-container">
            <strong>
                {{$registro->valeSolicitante}}
            </strong>
        </td>
        <td style="height: 5%; width: 19%; border-right: 2px solid #000;" class="image-container">

        </td>
        <td style="height: 5%; width: 22%; border-right: 2px solid #000;" class="image-container">
            <strong>
                {{$registro->valeAutorizo}}
            </strong>
        </td>
        <td style="height: 5%; width: 40%; padding-top: 10px; padding-left: 10px; padding-bottom: 10px; padding-right: 10px; border-left: 2px solid #000;">
            <img src="css/sello-topo.jpeg" width="70%" alt="">
        </td>
    </tr>

    <tr style="text-align: center;">
        <td style="width: 22%; border-right: 2px solid #000;" class="image-container">
            <strong>
                Solicitante:
            </strong>
        </td>
        <td style="width: 19%; border-right: 2px solid #000;" class="image-container">
            <strong>
                Recibio:
            </strong>
        </td>
        <td style="width: 19%; border-right: 2px solid #000;">
            <strong>
                Responsable:
            </strong>
        </td>
        <td style="width: 40%; border-right: 2px solid #000;">
            <strong>
                Sello:
            </strong>
        </td>
    </tr>
</table>