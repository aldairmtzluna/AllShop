<?php
    session_start();
?>
<nav class="nav-seller">
    <ul class="ul-nav-seller">
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/package.png"></img>
                    <p class="text-item-nav-seller">Envios</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="item()" id="row"></img>
                </div>
            </div>
            <div class="items-nav-seller">
                <a href=""><p class="p-items-nav-seller">Mis envios</p></a>
                <a href=""><p class="p-items-nav-seller">Envios masivos</p></a>
                <a href=""><p class="p-items-nav-seller">Configuración de envios</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/notepad.png"></img>
                    <p class="text-item-nav-seller">Pedidos</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemOne()" id="rowOne"></img>
                </div>
            </div>
            <div class="items-nav-seller one">
                <a href=""><p class="p-items-nav-seller">Mis pedidos</p></a>
                <a href=""><p class="p-items-nav-seller">Cancelación</p></a>
                <a href=""><p class="p-items-nav-seller">Devolución / reembolso</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/shopping-bag.png"></img>
                    <p class="text-item-nav-seller">Producto</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemTwo()" id="rowTwo"></img>
                </div>
            </div>
            <div class="items-nav-seller two">
                <a href="<?php echo SERVERURL ?>user/seller/my-products"><p class="p-items-nav-seller">Mis productos</p></a>
                <a href="<?php echo SERVERURL ?>user/seller/add-products"><p class="p-items-nav-seller">Nuevo producto</p></a>
                <a href=""><p class="p-items-nav-seller">Violaciones de productos</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/purchase.png"></img>
                    <p class="text-item-nav-seller">Marketing</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemThree()" id="rowThree"></img>
                </div>
            </div>
            <div class="items-nav-seller three">
                <a href=""><p class="p-items-nav-seller">Centro de marketing</p></a>
                <a href=""><p class="p-items-nav-seller">AllShoop ads</p></a>
                <a href=""><p class="p-items-nav-seller">Cupones</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/line-chart.png"></img>
                    <p class="text-item-nav-seller">Datos</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemFour()" id="rowFour"></img>
                </div>
            </div>
            <div class="items-nav-seller four">
                <a href=""><p class="p-items-nav-seller">Información empresarial</p></a>
                <a href=""><p class="p-items-nav-seller">Salud de la cuenta</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/chat.png"></img>
                    <p class="text-item-nav-seller">Atención a cliente</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemFive()" id="rowFive"></img>
                </div>
            </div>
            <div class="items-nav-seller five">
                <a href=""><p class="p-items-nav-seller">Chat</p></a>
                <a href=""><p class="p-items-nav-seller">Preguntas</p></a>
                <a href=""><p class="p-items-nav-seller">Actualización</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/store.png"></img>
                    <p class="text-item-nav-seller">Tienda</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemSix()" id="rowSix"></img>
                </div>
            </div>
            <div class="items-nav-seller six">
                <a href=""><p class="p-items-nav-seller">Calificación</p></a>
                <a href=""><p class="p-items-nav-seller">Perfil</p></a>
                <a href=""><p class="p-items-nav-seller">Decoración</p></a>
                <a href=""><p class="p-items-nav-seller">Categorias</p></a>
                <a href=""><p class="p-items-nav-seller">Medios</p></a>
                <a href=""><p class="p-items-nav-seller">Mis informes</p></a>
            </div>
        </div>
        <div class="item-nav-seller">
            <div class="info-item-nav-seller">
                <div class="txt-item-nav-seller">
                    <img class="icon-item-nav-seller" src="<?php echo SERVERURL?>views/img/icons/cog.png"></img>
                    <p class="text-item-nav-seller">Configuración</p>
                </div>
                <div class="row-item-nav-seller">
                    <img src="<?php echo SERVERURL?>views/img/icons/down.png" onclick="itemSeven()"  id="rowSeven"></img>
                </div>
            </div>
            <div class="items-nav-seller seven">
                <a href=""><p class="p-items-nav-seller">Direcciones</p></a>
                <a href=""><p class="p-items-nav-seller">Tienda</p></a>
                <a href=""><p class="p-items-nav-seller">Cuenta</p></a>
                <a href=""><p class="p-items-nav-seller">Socios</p></a>
            </div>
        </div>
    </ul>
</nav>
<div class="container-bubble">
        <div onclick="openComSeller()" class="bubble" id="bubble-coemments">
            <div class="info-bubble">
                <div class="tittle-bubble" id="tittle-bubble">
                    <p class="p-bubble">Comentarios</p>
                </div>
                <div class="icon-bubble" id="icon-bubble">
                    <img class="icon-bubble-seller" src="<?php echo SERVERURL?>views/img/icons/comment.png"></img>
                </div>
            </div>        
        </div>
    </div>
    <div class="container-bubble" style="top: 250px;">
        <div onclick="openAt()" class="bubble">
            <div class="info-bubble">
                <div class="tittle-bubble">
                    <p>Asistencia</p>
                </div>
                <div class="icon-bubble" title="Asistencia Personalizada.">
                    <img class="icon-bubble-seller" src="<?php echo SERVERURL?>views/img/icons/headphone.png"></img>
                </div>
            </div>        
        </div>
    </div>
    <div class="container-modal-form-comunication" id="modal" style="z-index: 1;">
        <div class="modal-form-comunication">
            <div class="container-exit-modal-form-comunication">
                <img onclick="exitComSeller()" src="<?php echo SERVERURL ?>views/img/icons/x.png" id="exit" alt="">
            </div>
        </div>
    </div>
    <div class="container-modal-attendance" id="modal-att" style="z-index: 1;">
        <div class="modal-attendance">
            <div class="container-header-modal-attendance">
                <div class="logo-header-modal-attendance">
                    <img src="<?php echo SERVERURL?>views/img/allshop-logo.png" alt="">
                    <h5>Asistencia con AllShop.</h5>
                </div>
                <div class="exit-header-modal-attendance">
                    <img onclick="exitAt()"  src="<?php echo SERVERURL ?>views/img/icons/x.png" id="exit-att" alt="">
                </div>
            </div>
        </div>
    </div>
    