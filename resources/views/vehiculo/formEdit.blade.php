<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            

                <label for="vehiculoEco">Numero economico:</label>
                <input type="text" value="{{ $dato->vehiculoEco }}" placeholder="" class="form-control"
                    name="vehiculoEco" id="vehiculoEco"><br>

                <label for="vehiculoPlacas">Placas del vehiculo:</label>
                <input type="text" value="{{ $dato->vehiculoPlacas }} " placeholder="" class="form-control"
                    name="vehiculoPlacas" id="vehiculoPlacas"><br>

                <label for="vehiculoModelo">Modelo del vehiculo:</label>
                <input type="text" value="{{ $dato->vehiculoModelo }} " placeholder="" class="form-control"
                    name="vehiculoModelo" id="vehiculoModelo"><br>

                <label for="vehiculoMarca">Marca del vehiculo:</label>
                <input type="text" value="{{ $dato->vehiculoMarca }} " placeholder="" class="form-control"
                    name="vehiculoMarca" id="vehiculoMarca"><br>

                <label for="vehiculoAño">Año del vehiculo:</label>
                <input type="text" value="{{ $dato->vehiculoAño }} " placeholder="" class="form-control"
                    name="vehiculoAño" id="vehiculoAño">
                <br>
                <label for="vehiculoCombustible" class="mb-3">Combustible:</label>
                <select class="form-select mb-3" aria-label="Seleccione el tipo de combustible"
                    name="vehiculoCombustible" id="vehiculoCombustible">
                    <option value="Gasolina" {{ $dato->vehiculoCombustible == 'Gasolina' ? 'selected' : '' }}>Gasolina
                    </option>
                    <option value="Diesel" {{ $dato->vehiculoCombustible == 'Diesel' ? 'selected' : '' }}>Diesel
                    </option>
                </select>


                <div>
                    <input class="btn btn-primary" type="submit" >
                </div>

            </div>
        </div>
    </div>
</div>
