
        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <label for="usuarioNombre" class="mb-3">Nombre:</label>
                        <input type="text" value="{{ $dato->name }}" placeholder="" class="form-control mb-3"
                            name="name" id="name">

                        <label for="usuarioEmail" class="mb-3">Email:</label>
                        <input type="text" value="{{ $dato->email }}" placeholder="" class="form-control mb-3"
                            name="email" id="email">

                            <div >
                                <label for="usuarioRol" class="form-label">Rol:</label>
                                <select class="form-select mb-3" aria-label="Default select example" name="role" id="role"required>
                                   
                                        <option value="superAdmin">Súper Adminstrador</option>
                                        <option value="admin">Admin</option>
                                        <option value="conductor">Conductor</option>
                                   
                                </select>
                            </div>
                            <br>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit">
                        </div>
                    </div>
                </div>
            </div>
  
