<?php
    session_start();
    require_once "../config/APP.php";
    require_once "../config/conn.php";
    require_once "components/head.php";
    require_once "components/header.php";
?>
<?php

    $idCat = $_GET['asicat'];
    $queryInfoCat = $conn->query("SELECT * FROM categorias WHERE id_categoria = $idCat");
    if ($rowCat = mysqli_fetch_array($queryInfoCat)) {
?>
    <div class="container-products-category">
        <div class="products-category">
                <?php
                    $sql = $conn->prepare("SELECT *,
                                        SUBSTRING_INDEX(fecha_creacion_producto, '-', 1) AS año,
                                        SUBSTRING_INDEX(foto_uno_producto, '_', 1) AS mes,
                                        SUBSTRING(nombre_producto, 1,50)
                                        FROM productos
                                        WHERE id_categoria_producto = '$idCat'");
                    $sql->execute();
                    $result = $sql->get_result();
                    if ($result->num_rows > 0) {
                        $counter = 0; // Contador para determinar cuándo se debe cerrar una fila
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['nombre_producto'];
                            $discount = $row['descuento_producto'];
                            $price = $row['precio_producto'];
                            $total = $price - $price * ($discount / 100);
                            $formattedTotal = number_format($total, 2, '.', '');
                            if ($counter % 4 === 0) {
                                // Si el contador es divisible por 4, es decir, se han impreso 4 columnas, cierra la fila anterior y abre una nueva
                                if ($counter !== 0) {
                                  echo '</div>';
                                }
                                echo '<div class="row-products-category">';
                              }
                ?>
                <a href="<?php echo SERVERURL ?>products/product-info?asipip=<?php echo $row['id_producto']?>&ASP=<?php echo hash_hmac('sha1', $name, KEY_TOKEN);?>" class="a-col-products-cat">
                    <div class="col-products-category">
                        <div class="container-product-info-cat">
                            <div class="img-cat-product">
                                <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $row['id_usuario_producto'].'/'.$row['año'].'/'.$row['mes'].'/'.$row['nombre_producto'].'/'.$row['foto_uno_producto']?>" alt="">
                            </div>
                            <div class="container-info-product-cat">
                                <div class="info-product-cat">
                                    <p class="name-product-cat"><?php echo $row['SUBSTRING(nombre_producto, 1,50)']?>...</p>
                                </div>
                                <div class="info-product-cat">
                                    <p class="price-product-cat">$<?php echo $row['precio_producto']?>.00 MXN<div class="hr-price"></div></p>
                                    <p class="price-product-cat blue">$<?php echo $formattedTotal?>MXN</p>
                                </div>
                                <div class="info-product-cat">
                                    <div class="info-product-cat-cal">
                                        <img src="<?php echo SERVERURL ?>views/img/icons/star-regular.png" alt="" class="img-calif-cat">
                                        <img src="<?php echo SERVERURL ?>views/img/icons/star-regular.png" alt="" class="img-calif-cat">
                                        <img src="<?php echo SERVERURL ?>views/img/icons/star-regular.png" alt="" class="img-calif-cat">
                                        <img src="<?php echo SERVERURL ?>views/img/icons/star-regular.png" alt="" class="img-calif-cat">
                                        <img src="<?php echo SERVERURL ?>views/img/icons/star-regular.png" alt="" class="img-calif-cat">
                                    </div>
                                    <div class="info-product-cat-cal">
                                        <p>0 Vendidos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                        <?php
                $counter++;
                }
                echo '</div>'; // Cierra la última fila
            }
            ?>
        </div>
    </div>
    <div class="hr-cat-footer"></div>
    <div class="info-cat-footer">
        <div class="text-info-cat">
            <h2><?php echo $rowCat['titulo_categoria'];?></h2>
            <p><?php echo $rowCat['descripcion_categoria'];?></p>
        </div>
    </div>
<?php
    }
?>

<?php
    require_once "../views/components/footer.php";
?>