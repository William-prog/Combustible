<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">Registro Empleado</div>
            <div class="card-body">
               
                <form>
                    <div class="mb-3">
                        <label for="empleadoNumero" class="form-label">Número:</label>
                        <input type="text" class="form-control" name="empleadoNumero" id="empleadoNumero" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="empleadoNombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="empleadoNombre" id="empleadoNombre" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="empleadoPuesto" class="form-label">Puesto:</label>
                        <input type="text" class="form-control" name="empleadoPuesto" id="empleadoPuesto" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="empleadoDepartamento" class="form-label">Departamento:</label>
                        <select class="form-select" aria-label="Default select example" name="empleadoDepartamento" id="empleadoDepartamento">
                            @foreach ($departamento as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
