@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Subir Archivo</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="fileInput">Seleccionar archivo</label>
                            <input type="file" class="form-control-file" id="fileInput">
                        </div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

