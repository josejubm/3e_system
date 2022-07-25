<div class="row">
    <!-- basic form start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Crear Usuario</h4>
                <form action="usuarioControlador.php?action=registrar" method="post">
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

                    <div class="form-group">
                        <label for="intento">INTENTO</label>
                        <input type="number" name="intento" id="intento" class="form-control">
                    </div>

                    <div class="fprm-group">
                        <label for="lastLogin">LAST LOGIN</label>
                        <input type="datetime-local" name="lastLogin" id="lastLogin" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="activo">ACTIVO</label>
                        <input type="number" name="activo" id="activo" class="form-control">
                    </div>

                    <input type="submit" class="btn btn-outline-success mb-3" value="Enviar Datos">

                </form>
            </div>
        </div>
    </div>
    <!-- basic form end -->
</div>