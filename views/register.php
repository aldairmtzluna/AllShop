<?php
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("location: ../");
    }if (isset($_SESSION['id_administrador'])) {
        header("location: ../");
    }if (isset($_SESSION['id_vendedor'])) {
        header("location: ../");
    }  
    require_once "../config/APP.php";
    require_once "./components/head.php";
    require_once "./components/header-form.php";
    require_once "./components/alerts.php";
    include_once "../controllers/registerController.php";
?>
<section class="section-form">
    <div class="container-form">
        <div class="column-form">
            <div class="logo-form">
                <img src="<?php echo SERVERURL ?>views/img/allshop-logo.png" alt="">
                <h2 class="h2-logo-form">AllShop</h2>
                <h3 class="h3-logo-form">Compras en linea</h3>
            </div>
        </div>
        <div class="column-form">
            <div class="form form-register" style="height: 90%; margin-top: 0%;">
                <form action="" method="POST" class="form-all-shop" style="height: 100%;">
                    <div class="form-p">
                        <p>Registro</p>
                    </div>
                    <div class="form-inputs">
                        <input type="text" name="nombre_usuario" placeholder="Nombre completo" 
                        value="<?php echo isset($_POST['nombre_usuario']) ? htmlspecialchars($_POST['nombre_usuario']) : '';?>"></br>

                        <input type="email" name="correo_usuario" placeholder="Correo eléctronico" 
                        value="<?php echo isset($_POST['correo_usuario']) ? htmlspecialchars($_POST['correo_usuario']) : '';?>"></br>

                        <input type="number" name="telefono_usuario" placeholder="Teléfono" 
                        value="<?php echo isset($_POST['telefono_usuario']) ? htmlspecialchars($_POST['telefono_usuario']) : '';?>"></br>

                        <input type="text" name="usuario_usuario" placeholder="Nombre de usuario" 
                        value="<?php echo isset($_POST['usuario_usuario']) ? htmlspecialchars($_POST['usuario_usuario']) : '';?>"></br>

                        <input type="password" name="contraseña_usuario" placeholder="Contraseña" 
                        value="<?php echo isset($_POST['contraseña_usuario']) ? htmlspecialchars($_POST['contraseña_usuario']) : '';?>"></br>

                        <input type="submit" name="registrarse" class="btn-form" value="Registrarse"></br>
                    </div>
                    <hr class="hr-form" style="margin-top: 30px;">
                    <div class="final-section-form">
                        <p>Ya tienes cuenta en AllShop</p>
                        <a href="<?php echo SERVERURL ?>user/login">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once "./components/footer.php";
?>
<script src="<?php echo SERVERURL ?>views/js/alerts.js"></script>
