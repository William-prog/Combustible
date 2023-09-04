<div class="row">
    <div class="col-md-12">
        <div  class="card ">
            <div class="card-header  ">Registrar Vehiculo</div>
            <div class="card-body">
            
                <form>
                    <div class="mb-3">
                        <label for="vehiculoEco" class="form-label">Número económico:</label>
                        <input type="text" class="form-control"  name="vehiculoEco" id="vehiculoEco" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vehiculoPlacas" class="form-label">Placas:</label>
                        <input type="text" class="form-control"  name="vehiculoPlacas" id="vehiculoPlacas" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vehiculoModelo" class="form-label">Modelo:</label>
                        <input type="text" class="form-control" name="vehiculoModelo" id="vehiculoModelo" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vehiculoMarca" class="form-label">Marca:</label>
                        <input type="text" class="form-control"  name="vehiculoMarca" id="vehiculoMarca" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vehiculoAño" class="form-label">Año:</label>
                        <input type="text" class="form-control"  name="vehiculoAño" id="vehiculoAño" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="vehiculoCombustible" class="form-label">Combustible:</label>
                        <div class="mb-3 text-center">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="vehiculoCombustible" id="vehiculoCombustible1" value="Gasolina" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="vehiculoCombustible1">Gasolina</label>

                            <input type="radio" class="btn-check" name="vehiculoCombustible" id="vehiculoCombustible2" value="Diesel" autocomplete="off">
                            <label class="btn btn-outline-primary" for="vehiculoCombustible2">Diesel</label>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

