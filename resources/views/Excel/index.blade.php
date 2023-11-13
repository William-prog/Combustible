@extends('layouts.app')
<link href="{{ asset('/css/carruselExcel.css') }}" rel="stylesheet">
<script src="resources/js/carrusel.js"></script>
@section('content')
    <div class="container">

        <link rel="apple-touch-icon" type="image/png"
            href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />

        <meta name="apple-mobile-web-app-title" content="CodePen">

        <link rel="shortcut icon" type="image/x-icon"
            href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

        <link rel="mask-icon" type="image/x-icon"
            href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-b4b4269c16397ad2f0f7a01bcdf513a1994f4c94b8af2f191c09eb0d601762b1.svg"
            color="#111" />
        <script
            src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js">
        </script>
        <link rel="canonical" href="https://codepen.io/stanko/pen/dyQrOeB">


        <div class="container">
            <h4 class=" h3 text-center">Instrucciónes:</h4><br>
            <div class="content">
                <div class="pagination">
                    <!-- Aquí se generan los botones de paginación dinámicamente --><br>
                </div>
                <div class="state">
                    &nbsp;
                </div><br>
                <div class="controls">
                    <button class="control control--prev" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="control control--play-pause" aria-label="Play/Pause">
                        <i class="far fa-stop-circle"></i>
                    </button>
                    <button class="control control--next" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    
        <script>
            "use strict";
    
            function createPaginationItem(index) {
                const item = document.createElement('button');
                item.classList.add('pagination-item');
                item.addEventListener('animationend', handleAnimationEnd);
                item.addEventListener('click', () => update(index));
                
                const icon = document.createElement('i');
                icon.classList.add('fa', 'fa-icon-class');
                
                const progress = document.createElement('div');
                progress.classList.add('pagination-progress');
                
                item.appendChild(icon);
                item.appendChild(progress);
                
                return item;
            }
    
            function createPaginationItems(itemsCount) {
                const items = [];
                for (let i = 0; i < itemsCount; i++) {
                    items.push(createPaginationItem(i));
                }
                return items;
            }
    
            function handleAnimationEnd(event) {
                // Mantén esta función si deseas la lógica de la barra de progreso
                event.target.classList.add(classNames.RUNNING);
                event.target.classList.remove(classNames.DONE);
                
                let sibling = event.target;
                while ((sibling = sibling.previousSibling)) {
                    sibling.classList.remove(classNames.RUNNING);
                    sibling.classList.add(classNames.DONE);
                }
                
                sibling = event.target;
                while ((sibling = sibling.nextSibling)) {
                    sibling.classList.remove(classNames.RUNNING, classNames.DONE);
                }
            }
    
            function update(index) {
                activeIndex = index;
                handleAnimationEnd({ target: items[activeIndex] });
                
                // Cambiar el texto en lugar de números
                const textOptions = ['1. Selecciona el archivo', '2. Previsualiza el archivo', '3. Verifica archivo', '4. Presiona Importar'];
                $state.innerHTML = textOptions[activeIndex];
            }
    
            function prev() {
                if (activeIndex > 0) {
                    update(activeIndex - 1);
                }
            }
    
            function next() {
                if (activeIndex < ITEMS_COUNT - 1) {
                    update(activeIndex + 1);
                }
            }
    
            function playPause() {
                $pagination.classList.toggle(classNames.PAUSED);
                isPaused = !isPaused;
            }
    
            const classNames = {
                RUNNING: 'pagination-item--running',
                DONE: 'pagination-item--done',
                PAUSED: 'pagination--paused',
            };
    
            let activeIndex = 0;
            let isPaused = false;
            const ITEMS_COUNT = 4;
    
            const items = createPaginationItems(ITEMS_COUNT);
            const $pagination = document.querySelector('.pagination');
            const $state = document.querySelector('.state');
            const $prev = document.querySelector('.control--prev');
            const $next = document.querySelector('.control--next');
            const $playPause = document.querySelector('.control--play-pause');
    
            $pagination.replaceChildren(...items);
            $prev.addEventListener('click', prev);
            $next.addEventListener('click', next);
            $playPause.addEventListener('click', playPause);
            update(activeIndex);
        </script>

            <div class="card bg-light mt-3">
                <div class="card-body">

                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" pattern="\d+"
                        title="abre el documento" onsubmit="return validarFormulario()">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <input type="file" name="file" id="excelFile" class="form-control"required>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success" style="width: 100%">
                                    Importar
                                </button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-warning" style="width: 100%" href="{{ route('export') }}">
                                    Exportar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <div class="container mt-2">


        @include('excel.tabla') <!-- Incluye la vista de la tabla -->


    </div>
@endsection
