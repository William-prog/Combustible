

<div class="row ">
    <div class="col-md-12  ">
        <div class="card ">
            <div class="card-header">{{ __('Registro Area') }}</div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="areaNombre" class="form-label">Nombre de la área:</label>
                        <input type="text" class="form-control" name="areaNombre" id="areaNombre" placeholder="Escribe el nombre de la área">
                    </div>
                    <div class="mb-3">
                        <label for="areaDepartamento" class="form-label">Área de Departamento:</label>
                        <select class="form-select" aria-label="Default select example"name="areaDepartamento" id="areaDepartamento">
                            @foreach ($departamento as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="areaDescripcion" class="form-label">Descripción del área:</label>
                        <input type="text" class="form-control" name="areaDescripcion" id="areaDescripcion" placeholder="Descripción">
                    </div>
                    <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

