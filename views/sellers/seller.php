<?php
    session_start();  
    if (isset($_SESSION['id_usuario'])) {
        header("location: ../user/seller/contry");
    }if (isset($_SESSION['id_administrador'])) {
        header("location: ../");
    }if (isset($_SESSION['id_vendedor'])) {
        header("location: ../");
    }
    require_once "../../config/APP.php";
    require_once "../../config/conn.php";
    require_once "../components/head.php";
    require_once "../components/header-form.php";
    require_once "../components/alerts.php";
    include_once "../../controllers/sellerController.php";
?>
<section class="section-form">
    <div class="container-form">
        <div class="column-form">
            <div class="logo-form">
                <img src="<?php echo SERVERURL ?>views/img/allshop-logo.png" alt="">
                <h2 class="h2-logo-form">AllShop</h2>
                <h3 class="h3-logo-form">Vendedores</h3>
            </div>
        </div>
        <div class="column-form">
            <div class="form">
                <form action="" method="POST" class="form-all-shop" id="login">
                    <div class="form-p">
                        <p>Iniciar Sesión</p>
                    </div>
                    <div class="form-inputs">
                        <input type="text" name="usuario_usuario" placeholder="Nombre de Usuario"
                        value="<?php echo isset($_POST['usuario_usuario']) ? htmlspecialchars($_POST['usuario_usuario']) : '';?>"></br>
                        <input type="password" name="contraseña_usuario" placeholder="Contraseña" 
                        value="<?php echo isset($_POST['contraseña_usuario']) ? htmlspecialchars($_POST['contraseña_usuario']) : '';?>"></br>
                        <input type="submit" name="entrar" class="btn-form" value="INICIAR SESIÓN"></br>
                        <a href="">¿Olvidasta tu contraseña?</a>
                    </div>
                    <hr class="hr-form">
                    <div class="final-section-form">
                        <p>Eres nuevo en AllShop</p>
                        <a href="<?php echo SERVERURL ?>user/register">Registrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once "../components/footer.php";
?>
<script src="<?php echo SERVERURL ?>views/js/alerts.js"></script>