@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header mb-3 text-center">
                Importar
            </div>
            <div class="card-body">
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" pattern="\d+" title="abre el documento" onsubmit="return validarFormulario()">
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
