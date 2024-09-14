<?php
    error_reporting(0);
    session_start();
    require_once "../../../config/conn.php";
?>
<body class="body">
    <header>
        <nav class="header-seller" style="background: #ffff; display: flex; position: fixed;z-index: 1;">
            <div class="logo-allshop">
                <a href="<?php echo SERVERURL ?>user/seller/dashboard-seller" style="width:100%; color: #00ACF1;">
                    <img src="<?php echo SERVERURL ?>views/img/allshop-logo.png" alt="" class="logo-seller">
                    <h2 class="h2-logo-all-shop h2-seller-logo" style="color: #FFD400;">AllShop <strong style="margin-left: 5px; color: #000000;">Centro de vendedores</strong>
                </a>
            </div>
            <div class="user-seller" id="user-seller">
                <?php
                    $id_seller = $_SESSION['id_usuario'];
                    $queryProfileSeller = $conn->query("SELECT perfil_usuario, usuario_usuario FROM usuarios WHERE id_usuario = '$id_seller'");
                    if ($rowSeller = mysqli_fetch_array($queryProfileSeller)) {
                ?>
                <div class="info-user-seller">
                    <img src="<?php echo SERVERURL ?>views/img/perfiles/<?php echo $rowSeller['perfil_usuario']?>" alt="">
                </div>
                <div class="info-user-seller">
                    <p><?php echo $_SESSION['usuario_usuario']?></p>
                    <img onclick="infoSeller()" id="rowHeader" class="rowHeader" src="<?php echo SERVERURL?>views/img/icons/down-black.png"></img>
                    
                </div>
            </div>
            <div class="profile-logout-seller" id="info">
                <div class="pr-lg-seller">
                    <div class="pr-lg-icon">
                        <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/image.png"></img>
                    </div>
                    <div class="pr-lg-text">
                        <a href="">Peril de la tienda</a>
                    </div>
                </div>
                <div class="pr-lg-seller">
                    <div class="pr-lg-icon">
                        <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/log-out.png"></img>
                    </div>
                    <div class="pr-lg-text">
                        <a href="<?php echo SERVERURL ?>controllers/logOutController.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="container-info-noti-seller">
                <!--- <hr class="hr-header-seller"> ---->
                <div class="info-noti-seller">
                    <div class="icon-info-noti-seller">
                        <img src="<?php echo SERVERURL?>views/img/icons/dialpad.png" alt="">
                    </div>
                </div>
                <div class="info-noti-seller">
                    <div class="icon-info-noti-seller"> 
                        <img src="<?php echo SERVERURL?>views/img/icons/bell.png" alt="">
                    </div>
                </div>
            </div>
        </nav>
    </header>
    