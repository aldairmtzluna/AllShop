<?php
    error_reporting(0);
    include_once "config/conn.php";
?>
<header>
    <nav style="position: fixed; top: 0; z-index: 1000;">
        <div class="info-general">
            <div class="social-allshop">
                <div class="social-allshop-p">
                    <p class="p-social-allshop">Siguenos en: </p>
                </div>
                <div class="icons-social-allshop">
                    <a href="" class="a-social-allshop"><img src="<?php echo SERVERURL ?>views/img/icons/facebook.png" alt=""></a>
                    <a href="" class="a-social-allshop"><img src="<?php echo SERVERURL ?>views/img/icons/instagram.png" alt=""></a>
                    <a href="" class="a-social-allshop"><img src="<?php echo SERVERURL ?>views/img/icons/twitter.png" alt=""></a>
                </div>
            </div>
            <div class="info-user" style="width: 90%;">
                <ul class="ul-info-user">
                    <li class="li-info-user"><a href="" class="a-info-user"><img class="icon-info-user" src="<?php echo SERVERURL?>views/img/icons/bell-white.png" alt="">Notificaciones</a></li>
                    <li class="li-info-user"><a href="" class="a-info-user"><img class="icon-info-user" src="<?php echo SERVERURL?>views/img/icons/help.png" alt="">Notificaciones</a></li>
                    <?php
                        if (!isset($_SESSION['id_usuario']) && (!isset($_SESSION['id_administrador']))){
                    ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/register" class="a-info-user">Registrarse</a></li>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/login" class="a-info-user">Iniciar Sesión</a></li>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user">Vendedor@s</a></li>
                    <?php
                        }else {
                    ?>
                    <li class="li-info-user perfil">
                        <a href="<?php echo SERVERURL ?>user/profile" class="a-info-user">
                            <?php
                                $id_user = $_SESSION['id_usuario'];
                                $idAdmin = $_SESSION['id_administrador'];
                                $query = $conn->query("SELECT * FROM usuarios WHERE id_usuario = '$id_user'");
                                $queryAdmin = $conn->query("SELECT * FROM administradores WHERE id_administrador = '$idAdmin'");                          
                                if ($fila = mysqli_fetch_array($query)) {
                                ?>
                                    <img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $fila ['perfil_usuario'];?>" style="margin-left: -23px;">
                                <?php
                                }if ($filaAdmin = mysqli_fetch_array($queryAdmin)) {
                                ?>
                                    <img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $filaAdmin ['perfil_administrador'];?>" style="margin-left: -23px;">
                                <?php
                                    }
                                ?>
                            <?php echo $_SESSION['usuario_usuario']?>
                            <?php echo $_SESSION['usuario_administrador']?>
                        </a>
                    </li>
                        <?php
                            if(isset($_SESSION['id_administrador'])) {
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>views/admin/dashboard.php" class="a-info-user">Dashboard</a></li>
                        <?php
                            }else {
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user">Mi tienda</a></li>
                        <?php
                            }
                        ?>
                        <li class="li-info-user"><a href="<?php echo SERVERURL ?>controllers/logOutController.php" class="a-info-user">Cerrar Sesión</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="allshop-section-header">
            <div class="logo-allshop">
                <a href="<?php echo SERVERURL ?>">
                    <img src="<?php echo SERVERURL ?>views/img/allshop-logo-white.png" alt="">
                    <h2 class="h2-logo-all-shop">AllShop</h2>
                </a>
            </div>
            <div class="search-header">
                <div class="search-input">
                    <form action="<?php echo SERVERURL ?>controllers/searchController.php">
                        <input type="search" name="search" id="search" oninput="productsSearch()">
                        <button class="btn-search" type="submit" name="searching"><img src="<?php echo SERVERURL ?>views/img/icons/search.png" alt=""></button>
                    </form>
                    <div class="results" id="results"></div>
                </div>
                <ul class="ul-search">
                    <li class="li-search"><a href="" class="a-search">Tenis</a></li>
                    <li class="li-search"><a href="" class="a-search">Audifonos</a></li>
                    <li class="li-search"><a href="" class="a-search">Sudaderas</a></li>
                    <li class="li-search"><a href="" class="a-search">Gorras</a></li>
                    <li class="li-search"><a href="" class="a-search">mochilas</a></li>
                    <li class="li-search"><a href="" class="a-search">Plumones</a></li>
                    <li class="li-search"><a href="" class="a-search">Carteras</a></li>
                    <li class="li-search"><a href="" class="a-search">Relojes</a></li>
                </ul>
            </div>
            <div class="cart">
                <?php
                    if (isset($_SESSION['id_usuario'])) {
                ?>
                <a href="<?php echo SERVERURL ?>user/cart?iucrt=<?php echo $id_user?>&iucrtu=<?php echo password_hash($id_user, PASSWORD_BCRYPT)?>">
                    <img src="<?php echo SERVERURL ?>views/img/icons/cart.png" alt="">
                </a>
            </div>
            <div class="unity-cart-container">
                <div class="unity-cart">
                    <?php 
                        $sql = $conn->prepare("SELECT COUNT(id_carrito) as total FROM carritos WHERE id_usuario_carrito = ?");
                        $sql->bind_param("s", $id_user);
                        $sql->execute();
                        $result = $sql->get_result();
                        if ($result) {
                            $row = $result->fetch_assoc();
                    ?>
                            <p><?php echo $row['total']?></p>
                    <?php
                            }
                        }else {
                    ?>
                    <a href="<?php echo SERVERURL ?>user/login">
                        <img src="<?php echo SERVERURL ?>views/img/icons/cart.png" alt="">
                    </a>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="responsive">
    <div class="header-responsive">
        <div class="search-input">
            <form action="">
                <input type="search" name="" id="">
                <img class="search-responsive" src="<?php echo SERVERURL ?>views/img/icons/search.png" alt="">
            </form>
        </div>
        
        <?php 
        ?>
        <?php
            if (empty($_SESSION['id_usuario']) && empty($_SESSION['id_administrador'])) {
        ?>
        <div class="container-user">
            <a href="">
                <img class="cart-reponsive" src="<?php echo SERVERURL ?>views/img/icons/cart.png" alt="">
            </a>
            <a href="<?php echo SERVERURL ?>user/login"><img class="user-responsive" src="<?php echo SERVERURL ?>views/img/icons/user.png" alt=""></a>
        </div>
        <?php
            } if (isset($_SESSION['id_usuario'])) {
                $user = $_SESSION['id_usuario'];
                $queryUser = $conn->query("SELECT perfil_usuario FROM usuarios WHERE id_usuario = '$user'");
                if ($rowUser = mysqli_fetch_array($queryUser)) {
        ?>
        <div class="container-user">
            <a href="">
                <img class="cart-reponsive" src="<?php echo SERVERURL ?>views/img/icons/cart.png" alt="">
            </a>
            <a href="<?php echo SERVERURL ?>user/profile"><img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $rowUser['perfil_usuario']?>" alt="" class="perfil-user"></a>
            <div class="container-ul-user">
                <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user" style="margin-left: 210px;">Mi tienda</a></li>
                <li class="li-info-user"><a href="<?php echo SERVERURL ?>controllers/logOutController.php" class="a-info-user">Cerrar Sesión</a></li>
            </div>
            <?php
                }
            ?>
            <?php
                }
            ?>
        </div>
        <?php
            if (isset($_SESSION['id_administrador'])) {
                $adm = $_SESSION['id_administrador'];
                $queryadm = $conn->query("SELECT perfil_administrador FROM administradores WHERE id_administrador = '$adm'");
                if ($rowadm = mysqli_fetch_array($queryadm)) {
            ?>
            <div class="container-user">
                <a href="">
                    <img class="cart-reponsive" src="<?php echo SERVERURL ?>views/img/icons/cart.png" alt="">
                </a>
                <a href="<?php echo SERVERURL ?>user/profile"><img src="<?php echo SERVERURL?>views/img/perfiles/<?php echo $rowadm['perfil_administrador']?>" alt="" class="perfil-user"></a>
                <div class="container-ul-user" style="left: -282px;">
                    <li class="li-info-user"><a href="<?php echo SERVERURL ?>user/seller" class="a-info-user" style="margin-left: 200px;">Dashboard</a></li>
                    <li class="li-info-user"><a href="<?php echo SERVERURL ?>controllers/logOutController.php" class="a-info-user">Cerrar Sesión</a></li>
                </div>
                <?php
                    }
                ?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>