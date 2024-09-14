<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../../../user/seller");
    }
    require_once '../../../config/APP.php';
    require_once '../../../config/conn.php';
    require_once '../../components/head.php';
    require_once '../../components/header.php';

    $id = $_GET['asiprp'];
    $idUser = $_SESSION['id_usuario'];
    $sql = $conn->query("SELECT a.*, a.id_producto AS id, b.titulo_categoria,
                        SUBSTRING_INDEX(a.fecha_creacion_producto, '-', 1) AS año,
                        SUBSTRING_INDEX(a.foto_uno_producto, '_', 1) AS mes 
                        FROM productos AS a
                        INNER JOIN categorias AS b ON a.id_categoria_producto = b.id_categoria
                        WHERE id_producto = '$id'");
    if ($sql) {
        if ($row = mysqli_fetch_array($sql)) {
            $year = $row['año'];
            $month = $row['mes'];
            $name = $row['nombre_producto'];
            $model = $row['modelo_producto'];
            $description = $row['descripcion_producto'];
            $price = $row['precio_producto'];
            $stock = $row['existencia_producto'];
            $contry = $row['pais_origen_producto'];
            $category = $row['titulo_categoria'];
            $cost = $row['costo_envio_producto'];
            $discount = $row['descuento_producto'];
            $weight = $row['peso_producto'];
            $width = $row['ancho_producto'];
            $large = $row['largo_producto'];
            $hight = $row['alto_producto'];
            $preSale = $row['preventa_producto'];

            $total = $price - $price * ($discount / 100);
            $formattedTotal = number_format($total, 2, '.', '');            

            $onePhoto = $row['foto_uno_producto'];
            $twoPhoto = $row['foto_dos_producto'];
            $threePhoto = $row['foto_tres_producto'];
            $fourPhoto = $row['foto_cuatro_producto'];
        }
    }
?>

<div class="container-general-preview">
    <div class="container-info-product-preview">
        <div class="info-product-preview">
            <div class="container-principal-img-preview">
                <div class="principal-img-preview">
                    <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$onePhoto ?>" alt="">
                </div>
            </div>
            <div class="container-secundary-imgs-preview">
                <div class="secundary-imgs-preview">
                    <div class="containers-secundary-imgs-preview">
                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$onePhoto ?>" alt="" class="img-secundary">
                    </div>
                    <div class="containers-secundary-imgs-preview">
                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$twoPhoto ?>" alt="" class="img-secundary">
                    </div>
                    <div class="containers-secundary-imgs-preview">
                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$threePhoto ?>" alt="" class="img-secundary">
                    </div>
                    <div class="containers-secundary-imgs-preview">
                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$fourPhoto ?>" alt="" class="img-secundary">
                    </div>
                    <div class="containers-secundary-imgs-preview">
                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$fourPhoto ?>" alt="" class="img-secundary">
                    </div>
                </div>
            </div>
            <div class="share-favorite-container">
                <div class="share-favorite-container-flex">
                    <div class="container-share-product-preview">
                        <div class="text-share-product-preview">
                            <p>Compartir.</p>
                        </div>
                        <div class="container-icons-share-product-preview">
                            <div class="incons-share-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/messenger.png" alt="" class="img-icon-share-product-preview">
                            </div>
                            <div class="incons-share-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/instagram-black.png" alt="" class="img-icon-share-product-preview">
                            </div>
                            <div class="incons-share-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/facebook-black.png" alt="" class="img-icon-share-product-preview">
                            </div>
                            <div class="incons-share-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/pinterest.png" alt="" class="img-icon-share-product-preview">
                            </div>
                            <div class="incons-share-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/twitter-black.png" alt="" class="img-icon-share-product-preview">
                            </div>
                        </div>
                    </div>
                    <div class="favorite-container-info-product-preview">
                        <div class="icon-text-fovorite-info-product-preview">
                            <div class="fovorite-info-product-preview">
                                <img src="<?php echo SERVERURL ?>views/img/icons/heart.png" alt="" class="img-fovorite-info-product-preview">
                            </div>
                            <div class="fovorite-info-product-preview">
                                <p class="p-fovorite-info-product-preview">Favorito (0)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-product-preview">
            <div class="info-product-preview-container">
                <div class="name-product-preview-container">
                    <p><?php echo $name ?>.</p>
                </div>
                <div class="qualification-product-preview">
                    <div class="qualification-product-preview">
                        <p>0</p>
                        <hr class="frt-hr-qualification-product-preview">
                        <div class="stars-qualification-product-preview">
                            <img src="<?php echo SERVERURL?>views/img/icons/star-regular.png" alt="" class="img-star-product-preview">
                            <img src="<?php echo SERVERURL?>views/img/icons/star-regular.png" alt="" class="img-star-product-preview">
                            <img src="<?php echo SERVERURL?>views/img/icons/star-regular.png" alt="" class="img-star-product-preview">
                            <img src="<?php echo SERVERURL?>views/img/icons/star-regular.png" alt="" class="img-star-product-preview">
                            <img src="<?php echo SERVERURL?>views/img/icons/star-regular.png" alt="" class="img-star-product-preview">
                        </div>
                    </div>
                    <hr>
                    <div class="qualification-product-preview">
                        <p>0</p>
                        <hr class="frt-hr-qualification-product-preview hr-gray">
                        <p>calificaciones</p>
                    </div>
                    <hr>
                    <div class="qualification-product-preview">
                        <p>0</p>
                        <hr class="frt-hr-qualification-product-preview hr-gray">
                        <p>vendidos</p>
                    </div>
                </div>
                <div class="price-product-preview">
                    <h2 class="original-price">$<?php echo $price?>.00 MXN</h2><div class="price-hr"></div>
                    <h2>$<?php echo $formattedTotal?> MXN</h2>
                    <div class="discount">
                        <p><?php echo $discount?>% off</p>
                    </div>
                </div>
                <div class="shipment-product-preview">
                    <label for="">Envio</label>
                    <img src="<?php echo SERVERURL ?>views/img/icons/plane.png" alt="">
                    <div class="container-info-shipment-product-preview">
                        <div class="info-shipment-product-preview">
                            <p>Envio desde:</p>
                            <strong><p><?php echo $contry?></p></strong>
                        </div>
                        <div class="info-shipment-product-preview">
                            <p>Costo de envio:</p>
                            <strong><p>$<?php echo $cost?>.00 MXN</p></strong>
                        </div>
                    </div>
                </div>
                <div class="stock-product-preview">
                    <label for="">Cantidad</label>
                    <div class="info-shipment-product-preview-unit">
                        <p><strong><?php echo $stock?></strong> Unidades disponibles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-details-product">
            <div class="details-product">
                <p class="p-details">Detalles del producto.</p>
                <div class="details-product-text-container">
                    <div class="details-product-text">
                        <p>Categoría:</p>
                        <p>Stock/Existencia:</p>
                        <p>Preventa.</p>
                    </div>
                    <div class="details-product-text">
                        <p><strong><?php echo $category?></strong></p>
                        <p><strong><?php echo $stock?></strong></p>
                        <p><strong><?php echo $preSale?></strong></p>
                    </div>
                </div>
            </div>
            <div class="details-product">
                <p class="p-details">Descripción del producto.</p>
            </div>
            <div class="description-product-details">
                <p><?php echo $description?>.</p>
            </div>
        </div>
    </div>