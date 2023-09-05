@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Importar y Exportar Usando Laravel
            </div>
            <div class="card-body">
                <form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">
                        Import consumo Data
                    </button>
                    <a class="btn btn-warning" href="{{ route('export') }}">
                        Export Consumo Data
                    </a>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @include('excel.tabla') <!-- Incluye la vista de la tabla -->
    </div>
@endsection
