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


        <script>
            window.console = window.console || function(t) {};
        </script>

        <h4 class="text-center">Instrucciones</h4><br>

        <body translate="no">
            <div class="content">

                <div class="pagination">
                </div>

                <div class="state">
                    &nbsp;
                </div>
                <br>    
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
            <br>

            <script>
                "use strict";

                function getItem(index) {
                    const item = document.createElement('button');
                    item.classList.add('pagination-item');
                    item.addEventListener('animationend', next);
                    item.addEventListener('click', () => update(index));
                    const icon = document.createElement('i');
                    icon.classList.add('fa',
                        'fa-icon-class');
                    const progress = document.createElement('div');
                    progress.classList.add('pagination-progress');
                    item.appendChild(icon);
                    item.appendChild(progress);
                    return item;
                }

                function createItems(itemsCount) {
                    const items = [];
                    for (let i = 0; i < itemsCount; i++) {
                        items.push(getItem(i));
                    }
                    return items;
                }

                function jumpTo(item) {
                    if (isPaused) {
                        item.classList.remove(classNames.RUNNING);
                        item.classList.add(classNames.DONE);
                    } else {
                        item.classList.add(classNames.RUNNING);
                        item.classList.remove(classNames.DONE);
                    }
                    let sibling = item;
                    while ((sibling = sibling.previousSibling)) {
                        sibling.classList.remove(classNames.RUNNING);
                        sibling.classList.add(classNames.DONE);
                    }
                    sibling = item;
                    while ((sibling = sibling.nextSibling)) {
                        sibling.classList.remove(classNames.RUNNING, classNames.DONE);
                    }
                }

                function update(index) {
                    activeIndex = index;
                    jumpTo(items[activeIndex]);

                    // Cambiar el texto en lugar de números
                    const textOptions = ['1.<br> Selecciona el archivo', '2.<br>  Previsualiza el archivo',
                        '3.<br>Verifica archivo', '4.<br>Presiona Importar'
                    ];
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

                    // When unpausing,
                    // if the current slide is done, jump to the next one
                    if (!isPaused && items[activeIndex].classList.contains(classNames.DONE)) {
                        next();
                    }
                }

                const classNames = {
                    RUNNING: 'pagination-item--running',
                    DONE: 'pagination-item--done',
                    PAUSED: 'pagination--paused',
                };

                let activeIndex = 0;
                let isPaused = false;
                const ITEMS_COUNT = 4;

                const items = createItems(ITEMS_COUNT);
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
