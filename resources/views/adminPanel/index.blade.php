@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/panel.css') }}" rel="stylesheet">
<link href="{{ asset('/css/card.css') }}" rel="stylesheet">
<script src="resources/js/scroll.js"></script>

<div class="container ">

   
        <div class="accordion accordion-flush {{--panel-main--}}  " id="accordionExample">
            <div class="main-content shadow-lg p-3 mb-5 bg-body-tertiary rounded ">

                <div class="icon-container shadow-sm p-3 mb-5 bg-body-tertiary rounded ">
                    <div class="icon-box" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#flush-collapserRol" aria-expanded="false" aria-controls="flush-collapserRol" onclick="changeIconColor('icon5')">
                        <i id="icon5" class="fas fa-user-tie">
                            <p class="icon-label">Usuario</p>

                        </i>

                    </div>
                    <div class="icon-box" data-bs-toggle="collapse" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" onclick="changeIconColor('icon1')">
                        <i id="icon1" class="fas fa-users ">
                            <p class="icon-label ">Empleado</p>
                        </i>

                    </div>
                    <div class="icon-box" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" onclick="changeIconColor('icon2')">
                        <i id="icon2" class="fas fa-truck">
                            <p class="icon-label">Vehículo</p>
                        </i>

                    </div>
                    <div class="icon-box" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" onclick="changeIconColor('icon3')">
                        <i id="icon3" class="fas fa-cogs">
                            <p class="icon-label ">Área</p>
                        </i>

                    </div>
                    <div class="icon-box" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" onclick="changeIconColor('icon4')">
                        <i id="icon4" class="fas fa-cog">
                            <p class="icon-label">Departamento</p>
                        </i>

                    </div>

                </div>

            </div>

            <div class="accordion accordion-flush  " id="accordionFlushExample">
                <div class="accordion-item">
                    <div id="flush-collapserRol" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="row  ">
                                <div class="col-md-12">
                                    
                                    @include('rol.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            <div class="accordion accordion-flush  " id="accordionFlushExample">
                <div class="accordion-item">
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="row  ">
                                <div class="col-md-3 ">
                                    @include('empleado.create')
                                </div>
                                <div class="col-md-9">
                                    @include('empleado.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">

                    <div id="flush-collapseTwo" class="accordion-collapse collapse shadow-lg p-3 mb-5 bg-body-tertiary rounded" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-3 panel-left">
                                    @include('vehiculo.create')
                                </div>
                                <div class="col-md-9 panel-right">
                                    @include('vehiculo.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item ">

                    <div id="flush-collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-3 panel-left">
                                    @include('area.create')
                                </div>
                                <div class="col-md-9 panel-right">
                                    @include('area.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">

                    <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-3 panel-left">
                                    @include('departamento.create')
                                </div>
                                <div class="col-md-9 panel-right">
                                    @include('departamento.index')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

<script>
    var lastSelectedButtonId = null;

    function changeIconColor(iconId) {
        // Obtiene el botón actual
        var currentButton = document.getElementById(iconId);

        // Si hay un botón previamente seleccionado, quita su estilo de selección
        if (lastSelectedButtonId) {
            var lastSelectedButton = document.getElementById(lastSelectedButtonId);
            lastSelectedButton.classList.remove('icon-orange');
        }

        // Aplica el estilo al icono del botón actual
        currentButton.classList.add('icon-orange');

        // Actualiza la variable para el último botón seleccionado
        lastSelectedButtonId = iconId;
    }
</script>