<div class="row">
    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Crear Usuario</h4>
                <form action="usuarioControlador.php?action=registrar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="Nombre ">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Usuario">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Correo">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="fprm-group">
                        <label for="lastLogin">LAST LOGIN</label>
                        <input type="datetime-local" name="lastLogin" id="lastLogin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="activo">ESTADO</label>
                        <select name="activo" id="activo" class="form-control" required>
                            <option value="1">ACTIVO</option>
                            <option value="0">INACTIVO</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="activo">TIPO</label>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            <option value="NORMAL">NORMAL</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="form-label">FOTO</label>
                        <input class="form-control" type="file" name="foto" id="foto">
                    </div>

                    <br>

                    <input type="submit" class="btn btn-outline-success mb-3" value="Enviar Datos">

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
</div>