<?php
    session_start();
    if (empty($_SESSION['id_usuario'])) {
        header("location: ../../user/seller");
    }
    require_once '../../../config/APP.php';
    require_once '../../../config/conn.php';
    require_once '../../components/head.php';
    require_once './components/headerSeller.php';
    require_once './components/navSeller.php';
?>
<div class="container-table-my-products">
    <div class="container-my-products">
        <div class="container-head-my-products">
            <div class="head-my-products">
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">Todo.</a></li>
                    <div class="active-head-table-my-products"></div>
                </div>
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">En vivo.</a></li>
                </div>
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">Agotados.</a></li>
                </div>
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">Revisando</a></li>
                </div>
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">Violaciones.</a></li>
                </div>
                <div class="status-my-products">
                    <li class="item-status"><a href="" class="link-status">Dado de baja.</a></li>
                </div>
            </div>
        </div>
        <div class="container-add-more-products-head">
            <div class="add-more-products-head">
                <div class="add-more-products-head-info">
                    <div class="quantity-load-products">
                        <h4>0 Productos</h4>
                    </div>
                    <div class="quantity-load-products">
                        <p>Cargar 100 productos</p><img src="<?php echo SERVERURL ?>views/img/icons/help-black.png" alt="">
                    </div>
                </div>
                <div class="add-more-products-head-info">
                    <div class="tools-add-product">
                        <a href="<?php echo SERVERURL ?>user/seller/add-products"><button class="btn-add-product"><img src="<?php echo SERVERURL ?>views/img/icons/plus.png" alt="">Agregar nuevo producto</button></a>
                    </div>
                    <div class="tools-add-product">
                        <div class="type-view-my-products">
                            <div class="type-view">
                                <img src="<?php echo SERVERURL ?>views/img/icons/list.png" alt="">
                            </div>
                            <div class="type-view">
                                <img src="<?php echo SERVERURL ?>views/img/icons/grid.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-my-products-container">
            <table class="table table-responsive display table-my-products" id="table">
                <thead>
                    <tr>
                        <th class="col-md-2">Nombre del producto.</th>
                        <th class="col-md-1">SKU</th>
                        <th class="col-md-2">Categoria.</th>
                        <th class="col-md-1">Precio</th>
                        <th class="col-md-2">Stock</th>
                        <th class="col-md-1">Ventas</th>
                        <th class="col-md-4">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = $_SESSION['id_usuario'];
                        $sql = "SELECT a.*, a.id_producto AS id, b.titulo_categoria, 
                                SUBSTRING_INDEX(a.fecha_creacion_producto, '-', 1) AS año,
                                SUBSTRING_INDEX(a.foto_uno_producto, '_', 1) AS mes
                                FROM productos AS a
                                INNER JOIN categorias AS b ON a.id_categoria_producto = b.id_categoria                   
                                WHERE id_usuario_producto = '$id'";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                                        $idProducto = $row['id']
                    ?>
                    <tr>
                        <td style="height: 200px;">
                            <div class="container-name-producto-table">
                                <div class="info-product-table">
                                    <div class="container-img-info-product-table">
                                        <img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $id?>/<?php echo $row['año']?>/<?php echo $row['mes']?>/<?php echo $row['nombre_producto']?>/<?php echo $row['foto_uno_producto']?>" alt="">
                                    </div>
                                </div>
                                <div class="info-product-table">
                                    <p><?php echo $row['nombre_producto'];?></p><br>
                                    <p>SKU Principal</p>
                                    <div class="eye-heart-container-my-product">
                                        <a href=""><img src="<?php echo SERVERURL ?>views/img/icons/eye.png" alt=""></a>
                                        <a href=""><img src="<?php echo SERVERURL ?>views/img/icons/heart.png" alt=""></a>
                                    </div> 
                                </div>
                            </div>
                        </td>
                        <td>0</td>
                        <td><?php echo $row['titulo_categoria'] ?></td>
                        <td>$<?php echo $row['precio_producto'] ?>.00</td>
                        <td><?php echo $row['existencia_producto'] ?> pzs.</td>
                        <td>0</td>
                        <td>
                            <div class="container-action-btn-table-products">
                                <a href="<?php echo SERVERURL ?>user/seller/edit-product?asiedp=<?php echo $idProducto?>&ASP=<?php echo hash_hmac('sha1', $row['nombre_producto'], KEY_TOKEN);?>">
                                <button class="btn-action-table-products edit">Editar</button></a>
                                <button class="btn-action-table-products delete">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    <?php
                                    }
                                }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    require_once '../../components/scripts.php';
?>