<div class="row">
    <div class="col-md-12">
        <form>
            <label for="areaNombre">Nombre de la área:</label>
            <input type="text" value="{{ $dato->areaNombre }}" class="form-control  mb-3" name="areaNombre" id="areaNombre"
                placeholder="Escribe el nombre de la área"><br>

            <label for="areaDepartamento">Área de Departamento:</label>
            <select class="form-select  mb-3" aria-label="Default select example" name="areaDepartamento"
                id="areaDepartamento">
                @foreach ($departamento as $datoDpto)
                    <option value="{{ $datoDpto->id }}">{{ $datoDpto->departamentoNombre }}</option>
                @endforeach
            </select><br>

            <label for="areaDescripcion">Descripción del área:</label>
            <input type="text"  value="{{ $dato->areaDescripcion }}" class="form-control mb-3" name="areaDescripcion"
                id="areaDescripcion">
            <br>
            <div class="text-center">
                <input class="btn btn-primary" type="submit">
            </div>
        </form>
    </div>
</div>
