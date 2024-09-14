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
    $id = $_GET['asiedp'];
    $idUser = $_SESSION['id_usuario'];
    $sql = $conn->query("SELECT *,
                        SUBSTRING_INDEX(fecha_creacion_producto, '-', 1) AS año,
                        SUBSTRING_INDEX(foto_uno_producto, '_', 1) AS mes 
                        FROM productos
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
            $cost = $row['costo_envio_producto'];
            $discount = $row['descuento_producto'];
            $weight = $row['peso_producto'];
            $width = $row['ancho_producto'];
            $large = $row['largo_producto'];
            $hight = $row['alto_producto'];

            $onePhoto = $row['foto_uno_producto'];
            $twoPhoto = $row['foto_dos_producto'];
            $threePhoto = $row['foto_tres_producto'];
            $fourPhoto = $row['foto_cuatro_producto'];
        }
    }
?>
<div class="container-add-products">
    <div class="nav-add-products" style="height: 125px;">
        <div class="add-products">
            <div class="container-items-add-products">
                <li class="items-add-products">
                    <div class="circle-item-add-product"></div>    
                    <a href="#basic" class="link-item-add-products">Información basica.</a>
                </li>
            </div>
        </div>
        <div class="add-products">
            <div class="container-items-add-products">
                <li class="items-add-products">
                    <div class="circle-item-add-product"></div>    
                    <a href="#sales" class="link-item-add-products">Información de ventas.</a>
                </li>
            </div>
        </div>
        <div class="add-products">
            <div class="container-items-add-products">
                <li class="items-add-products">
                    <div class="circle-item-add-product"></div>    
                    <a href="#shipment" class="link-item-add-products">Envío.</a>
                </li>
            </div>
        </div>
    </div>
    <div class="container-form-add-products">
        <form action="<?php echo SERVERURL ?>controllers/addProductsController.php" method="POST" enctype="multipart/form-data">
            <div class="information-add-products" id="basic">
                <div class="container-a-preview">
                    <a href="<?php echo SERVERURL ?>user/seller/preview-product?asiprp=<?php echo $id?>&ASP=<?php echo hash_hmac('sha1', $name, KEY_TOKEN);?>">Vista Previa</a>
                </div>
                <div class="info-form-add-products">
                    <h3>Información basica.</h3>
                    <div class="form-control-add-product">
                        <label for="">Imagenes del producto:</label>
                        <div class="photo">
                            <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                                <div class="img-add-product img-add-product-edit">
                                    <img class="img-product-edit" src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$onePhoto?>" alt="">
                                </div>
                            </div>
                            <div class="upimg">
                                <input type="file" name="foto_uno_producto" id="foto">
                            </div>
                           
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videoss">
                            <div class="prevVideoss">
                                <span class="delVideoss notBlockVideoss">X</span>
                                <label for="videoss"></label>
                                <div class="img-add-product img-add-product-edit">
                                    <img class="img-product-edit" src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$twoPhoto?>" alt="">
                                </div>
                            </div>
                            <div class="upvdss">
                                <input type="file" name="foto_dos_producto" id="videoss">
                            </div>
                            
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videos">
                            <div class="prevVideos">
                                <span class="delVideos notBlockVideos">X</span>
                                <label for="videos"></label>
                                <div class="img-add-product img-add-product-edit">
                                    <img class="img-product-edit" src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$threePhoto?>" alt="">
                                </div>
                            </div>
                            <div class="upvds">
                                <input type="file" name="foto_tres_producto" id="videos">
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videosss">
                            <div class="prevVideosss">
                                <span class="delVideosss notBlockVideosss">X</span>
                                <label for="videosss"></label>
                                <div class="img-add-product img-add-product-edit">
                                    <img class="img-product-edit" src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $idUser.'/'.$year.'/'.$month.'/'.$name.'/'.$fourPhoto?>" alt="">
                                </div>
                            </div>
                            <div class="upvdsss">
                                <input type="file" name="foto_cuatro_producto" id="videosss">
                            </div>
                            
                            <div id="form_alert"></div>
                        </div><br><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Video del producto:</label>
                        <div class="Video">
                            <div class="prevVideo">
                                <span class="delVideo notBlockVideo">X</span>
                                <label for="video"></label>
                            </div>
                            <div class="upvd">
                                <input type="file" name="video" id="video" accept="video/mp4">
                            </div>
                            <div class="img-add-product">
                                <img class="" src="<?php echo SERVERURL ?>views/img/icons/video-add.png" alt="">
                                <p>Añadir Video</p>
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Nombre del producto:</label>
                        <input type="text" class="input-add-product" name="nombre_producto" value="<?php echo $name?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Modelo del producto:</label>
                        <input type="text" class="input-add-product" name="modelo_producto" value="<?php echo $model?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Descripción del producto:</label>
                        <textarea name="descripcion_producto" id="" cols="30" rows="10" class="input-add-product" style="height: 350px;"
                        value="<?php echo $description?>"><?php echo $description?></textarea>    
                    </div>
                </div>            
            </div>
            <div class="information-add-products" id="sales">
                <div class="info-form-add-products">
                    <h3>Información de ventas.</h3>
                    <br>
                    <div class="form-control-add-product">
                        <label for="">Precio del producto:</label>
                        <input type="number" name="precio_producto" class="input-add-product" value="<?php echo $price?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Existencia del producto:</label>
                        <input type="number" name="existencia_producto" class="input-add-product" value="<?php echo $stock?>"><br><br>
                    </div>
                </div>
            </div>
            <div class="information-add-products" id="shipment" style="height: 550px !important;">
                <div class="info-form-add-products">
                    <h3>Información de envio.</h3>
                    <br>
                    <div class="form-control-add-product">
                        <label for="">País de origen:</label>
                            <input type="text" class="input-add-product" name="pais_origen_producto" value="<?php echo $contry; ?>">
                        <br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Costo de envio:</label>
                        <input type="number" name="costo_envio_producto" class="input-add-product" value="<?php echo $cost?>"><br><br>
                    </div>
                    
                    <div class="form-control-add-product">
                        <label for="">Descuento del producto (%):</label>
                        <input type="number" name="descuento_producto" class="input-add-product" value="<?php echo $discount?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Peso del producto, especifica->(g,kg):</label>
                        <input type="text" name="peso_producto" class="input-add-product" value="<?php echo $weight?>"><br><br>
                    </div>
                    <div class="form-control-add-product package_size">
                        <label for="">Tamaño del paquete (cm):</label>
                        <input type="number" name="ancho_producto" class="input-add-product" placeholder="Ancho" value="<?php echo $width?>">
                        <input type="number" name="largo_producto" class="input-add-product" placeholder="Largo" value="<?php echo $large?>">
                        <input type="number" name="alto_producto" class="input-add-product" placeholder="Alto" value="<?php echo $hight?>">
                    </div>
                    <div class="form-control-add-product">
                        <input type="submit" class="input-add-product btn-add-product" value="Cancelar" name="cancelar">
                        <input type="hidden" class="input-add-product btn-add-product" value="h" name="h">
                        <input type="submit" class="input-add-product btn-add-product" value="Guardar" name="publicar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>