
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header mb-3 " style="background-color: #FF771F; color: white;">Registro Empleado</div>
            <div class="card-body">
               
                <form>
                    <div >
                        <label for="empleadoNumero" class="form-label" style="text-align: left;">Número:</label>
                        <input type="text" class="form-control" name="empleadoNumero" id="empleadoNumero" placeholder="">
                    </div>
                    <br>
                    <div >
                        <label for="empleadoNombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="empleadoNombre" id="empleadoNombre" placeholder="">
                    </div>
                    <div >
                        <br>
                        <label for="empleadoPuesto" class="form-label">Puesto:</label>
                        <input type="text" class="form-control" name="empleadoPuesto" id="empleadoPuesto" placeholder="">
                    </div>
                    <br>
                    <div >
                        <label for="empleadoDepartamento" class="form-label">Departamento:</label>
                        <select class="form-select" aria-label="Default select example" name="empleadoDepartamento" id="empleadoDepartamento">
                            @foreach ($departamento as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3 text-center">
                        <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
