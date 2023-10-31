

<div class="row ">
    <div class="col-md-12  ">
        <div class="card ">
            <div class="card-header mb-3"  style="background-color: #FF771F; color: white;">{{ __('Registro Area') }}</div>
            <div class="card-body">
                <form>
                    <div >
                        <label for="areaNombre" class="form-label">Nombre :</label>
                        <input type="text" class="form-control" name="areaNombre" id="areaNombre" required>
                    </div>
                    <br>
                    <div >
                        <label for="areaDepartamento" class="form-label">Área de Departamento:</label>
                        <select class="form-select" aria-label="Default select example"name="areaDepartamento" id="areaDepartamento">
                            @foreach ($departamento as $dato)
                                <option value="{{ $dato->id }}">{{ $dato->departamentoNombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div >
                        <label for="areaDescripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="areaDescripcion" id="areaDescripcion" required>
                    </div> <br>
                    <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

