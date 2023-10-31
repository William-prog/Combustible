
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               
                <div class="card-body">
                    <label for="departamentoNombre" class="mb-3">Nombre del departamento:</label>
                    <input type="text" value="{{ $dato->departamentoNombre }}" placeholder="Escribe el nuevo departamento" class="form-control mb-3" name="departamentoNombre" id="departamentoNombre">
                    
                    <label for="departamentoCC" class="mb-3">Departamento de Centro de Costos:</label>
                    <input type="text" value="{{ $dato->departamentoCC }}" placeholder="Departamento centro de costos" class="form-control mb-3" name="departamentoCC" id="departamentoCC">
                    
                    <label for="departamentoDescripcion" class="mb-3">Descripción del departamento:</label>
                    <input type="text" value="{{ $dato->departamentoDescripcion }}" placeholder="Descripción" class="form-control mb-3" name="departamentoDescripcion" id="departamentoDescripcion">
                    
                    <label for="departamentoArea" class="mb-3">Area:</label>
                <select class="form-select mb-3" aria-label="Seleccione el tipo de combustible"
                    name="departamentoArea" id="departamentoArea">
                    <option value="Set" {{ $dato->departamentoArea == 'Set' ? 'selected' : '' }}>Set
                    </option>
                    <option value="Operacion" {{ $dato->departamentoArea == 'Operacion' ? 'selected' : '' }}>Operacion
                    </option>
                    <option value="Ambos" {{ $dato->departamentoArea == 'Ambos' ? 'selected' : '' }}>Ambos
                    </option>
                </select>
                    <div class="text-center">
                        <input class="btn btn-primary" type="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>

