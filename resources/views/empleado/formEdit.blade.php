
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Empleados</div>
                <div class="card-body">
                    <label for="empleadoNumero" class="mb-3">Numero:</label>
                    <input type="text" value="{{ $dato->empleadoNumero }}" placeholder="" class="form-control mb-3"
                        name="empleadoNumero" id="empleadoNumero">

                    <label for="empleadoNombre" class="mb-3">Nombre:</label>
                    <input type="text" value="{{ $dato->empleadoNombre }}" placeholder="" class="form-control mb-3"
                        name="empleadoNombre" id="empleadoNombre">

                    <label for="empleadoPuesto" class="mb-3">Puesto:</label>
                    <input type="text" value="{{ $dato->empleadoPuesto }}" placeholder="" class="form-control mb-3"
                        name="empleadoPuesto" id="empleadoPuesto">

                    <label for="empleadoDepartamento" class="mb-3">Departamento:</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="empleadoDepartamento"
                        id="empleadoDepartamento">
                        @foreach ($departamento as $datoDepartamento)
                            <option value="{{ $datoDepartamento->id }}">{{ $datoDepartamento->departamentoNombre }}</option>
                        @endforeach
                    </select>

                    <input class="btn btn-primary" type="submit">
                </div>
            </div>
        </div>
    </div>

