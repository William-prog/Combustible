<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">{{ __('Registro Departamento') }}</div>
            <div class="card-body">

                <form>
                    <div class="mb-3">
                        <label for="departamentoNombre" class="form-label">Nombre del departamento:</label>
                        <input type="text" class="form-control" name="departamentoNombre" id="departamentoNombre"
                            placeholder="Escribe el departamento">
                    </div>
                    <div class="mb-3">
                        <label for="departamentoCC" class="form-label">Departamento CC:</label>
                        <input type="text" class="form-control" name="departamentoCC" id="departamentoCC" placeholder="Departamento CC">
                    </div>
                    <div class="mb-3">
                        <label for="departamentoDescripcion" class="form-label">Descripción del departamento:</label>
                        <input type="text" class="form-control" name="departamentoDescripcion" id="departamentoDescripcion"
                            placeholder="Descripción del departamento">
                    </div>
                    <div class="mb-3">
                        <label for="departamentoArea" class="form-label">Área:</label>
                        <div class="mb-3 text-center">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea1"
                                value="Set" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="departamentoArea1">Set</label>

                            <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea2"
                                value="Operacion" autocomplete="off">
                            <label class="btn btn-outline-primary" for="departamentoArea2">Operación</label>

                            <input type="radio" class="btn-check" name="departamentoArea" id="departamentoArea3"
                                value="Ambas" autocomplete="off">
                            <label class="btn btn-outline-primary" for="departamentoArea3">Ambas</label>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-primary">Guardar </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
