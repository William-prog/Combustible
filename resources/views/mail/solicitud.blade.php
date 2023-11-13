@foreach($valesRegistrados as $vale)
@if($vale->id == $ultimoRegistro->id)

<script src="https://kit.fontawesome.com/1bf0086160.js" crossorigin="anonymous"></script>
<style type="text/css">
    .content {
        width: 100%;
        max-width: 600px;
    }

    .header {
        padding: 10px 30px 10px 30px;
    }

    .innerpadding {
        padding: 30px 30px 30px 30px;
    }

    .borderbottom {
        border-bottom: 1px solid #f2eeed;
    }

    .subhead {
        font-size: 15px;
        color: #ffffff;
        font-family: sans-serif;
        letter-spacing: 10px;
    }

    .h1 {
        color: #FF771F;
        font-family: sans-serif;
    }

    .h2,
    .bodycopy {
        color: #153643;
        font-family: sans-serif;
    }

    .h1 {
        font-size: 33px;
        line-height: 38px;
        font-weight: bold;
    }

    .h2 {
        padding: 0 0 15px 0;
        font-size: 24px;
        line-height: 28px;
        font-weight: bold;
    }

    .bodycopy {
        font-size: 16px;
        line-height: 22px;
    }

    .button {
        text-align: center;
        font-size: 18px;
        font-family: sans-serif;
        font-weight: bold;
        padding: 0 30px 0 30px;
    }

    .button a {
        color: #ffffff;
        text-decoration: none;
    }

    .footer {
        padding: 20px 30px 15px 30px;
    }

    .footercopy {
        font-family: sans-serif;
        font-size: 14px;
        color: #ffffff;
    }

    .footercopy a {
        color: #ffffff;
        text-decoration: underline;
    }
</style>

<table width="100%" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <table bgcolor="#ffffff" width="100%" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td bgcolor="#242424" class="header">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="70" style="padding: 0 2px 2px 0;">
                                    <img class="fix" src="css/LogoBlanco.png" width="100" height="100" border="0" alt="" />
                                </td>
                            </tr>
                        </table>

                        <table class="col425" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                            <tr>
                                <td height="70">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="subhead" style="padding: 0 0 0 3px;">
                                                Nuevo
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="h1" style="padding: 5px 0 0 0;">
                                                Vale de combustible
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="innerpadding borderbottom">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="h2">
                                    {{$vale->valeSolicitante}}
                                </td>
                            </tr>
                            <tr>
                                <td class="bodycopy">
                                    El colaborador ha solicitado <strong> {{$vale->valeCantidad}} Litros </strong> de combustible para el vehiculo con <strong> Numero Economico {{$vale->valeEconomico}} </strong>
                                    con <strong> {{$vale->valeKilometraje}} km</strong>.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="innerpadding borderbottom">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="bodycopy">
                                    Recuerde iniciar sesion con su usuario y contraseña para <strong> aceptar/rechazar </strong> la peticion del vale, una vez realizada esta accion no habra manera de cancelar el vale, favor de verificar los datos <strong> cuidadosamente </strong>.
                                </td>
                            </tr>
                        </table>
                        <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 380px;">
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="padding: 20px 0 0 0;">
                                                <table class="buttonwrapper" bgcolor="#FF771F" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="button" height="45">
                                                            <a href="{{ url('informePDF', ['id' => $vale->id]) }}">Ver Vale</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="footer" bgcolor="#242424">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="center" class="footercopy">
                                    Servicios y Equipos TOPO S.A. de C.V<br />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endif
@endforeach