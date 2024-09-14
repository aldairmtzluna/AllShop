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
    require_once '../../components/alerts.php';
    require_once '../../../controllers/addProductsController.php';
?>
<div class="container-add-products">
    <div class="nav-add-products">
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
        <div class="add-products">
            <div class="container-items-add-products">
                <li class="items-add-products">
                    <div class="circle-item-add-product"></div>    
                    <a href="#other" class="link-item-add-products">Otro.</a>
                </li>
            </div>
        </div>
    </div>
    <div class="container-form-add-products">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="information-add-products" id="basic">
                <div class="info-form-add-products">
                    <h3>Información basica.</h3>
                    <div class="form-control-add-product">
                        <label for="">Imagenes del producto:</label>
                        <div class="photo">
                            <div class="prevPhoto">
                                <span class="delPhoto notBlock">X</span>
                                <label for="foto"></label>
                            </div>
                            <div class="upimg">
                                <input type="file" name="foto_uno_producto" id="foto">
                            </div>
                            <div class="img-add-product">
                                <img src="<?php echo SERVERURL ?>views/img/icons/image-add.png" alt="">
                                <p>Añadir Imagen</p>
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videoss">
                            <div class="prevVideoss">
                                <span class="delVideoss notBlockVideoss">X</span>
                                <label for="videoss"></label>
                            </div>
                            <div class="upvdss">
                                <input type="file" name="foto_dos_producto" id="videoss">
                            </div>
                            <div class="img-add-product">
                                <img src="<?php echo SERVERURL ?>views/img/icons/image-add.png" alt="">
                                <p>Añadir Imagen</p>
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videos">
                            <div class="prevVideos">
                                <span class="delVideos notBlockVideos">X</span>
                                <label for="videos"></label>
                            </div>
                            <div class="upvds">
                                <input type="file" name="foto_tres_producto" id="videos">
                            </div>
                            <div class="img-add-product">
                                <img src="<?php echo SERVERURL ?>views/img/icons/image-add.png" alt="">
                                <p>Añadir Imagen</p>
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                        <div class="ph Videosss">
                            <div class="prevVideosss">
                                <span class="delVideosss notBlockVideosss">X</span>
                                <label for="videosss"></label>
                            </div>
                            <div class="upvdsss">
                                <input type="file" name="foto_cuatro_producto" id="videosss">
                            </div>
                            <div class="img-add-product">
                                <img src="<?php echo SERVERURL ?>views/img/icons/image-add.png" alt="">
                                <p>Añadir Imagen</p>
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
                                <img src="<?php echo SERVERURL ?>views/img/icons/video-add.png" alt="">
                                <p>Añadir Video</p>
                            </div>
                            <div id="form_alert"></div>
                        </div><br><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Nombre del producto:</label>
                        <input type="text" class="input-add-product" name="nombre_producto"
                        value="<?php echo isset($_POST['nombre_producto']) ? htmlspecialchars($_POST['nombre_producto']) : '';?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Modelo del producto:</label>
                        <input type="text" class="input-add-product" name="modelo_producto"
                        value="<?php echo isset($_POST['modelo_producto']) ? htmlspecialchars($_POST['modelo_producto']) : '';?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Categoría del producto:</label>
                        <select name="categoria_producto" id="category" class="input-add-product" onchange="subcategory()">
                            <option value="Establezca la categoria" >Establezca la categoria</option>
                            <?php 
                                $sql ="SELECT id_categoria, titulo_categoria, REPLACE(titulo_categoria, ' ', '_') AS categoria FROM categorias ORDER BY titulo_categoria ASC";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_categoria']?>"  id="<?php echo $row['categoria']?>"><?php echo $row['titulo_categoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="electronic">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Eléctronicos</option>
                            <?php 
                            $electronic = '1';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $electronic);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                     <div class="form-control-add-product subcategory" id="mensFootwear">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Calzado de hombre</option>
                            <?php 
                            $mensFootwear = '2';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $mensFootwear);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="womensFootwear">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Calzado de mujer</option>
                            <?php 
                            $womensFootwear = '3';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $womensFootwear);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="videoGames">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Videojuegos</option>
                            <?php 
                            $videoGames = '4';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $videoGames);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="health">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Salud</option>
                            <?php 
                            $health = '5';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $health);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="watches">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Relojes y accesorios</option>
                            <?php 
                            $watches = '6';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $watches);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="beauty">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Belleza</option>
                            <?php 
                            $beauty = '7';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $beauty);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="home">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Hogar</option>
                            <?php 
                            $home = '8';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $home);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="sports">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Deportes</option>
                            <?php 
                            $sports = '9';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $sports);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="cars">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Accesorios para vehiculos</option>
                            <?php 
                            $cars = '10';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $cars);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="womenswear">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Ropa de mujer</option>
                            <?php 
                            $womenswear = '11';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $womenswear);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="menswear">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Ropa de hombre</option>
                            <?php 
                            $menswear = '12';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $menswear);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="trips">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Viajes</option>
                            <?php 
                            $trips = '13';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $trips);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="books">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Libros y revistas</option>
                            <?php 
                            $books = '14';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $books);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="pets">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Articulos para mascotas</option>
                            <?php 
                            $pets = '15';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $pets);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="stationery">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Papeleria</option>
                            <?php 
                            $stationery = '16';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $stationery);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div class="form-control-add-product subcategory" id="kits">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Bebes y niños</option>
                            <?php 
                            $kits = '19';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $kits);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                     <div class="form-control-add-product subcategory" id="appliances">
                        <label for="">Subcategoría del producto:</label>
                        <select name="categoria_producto" id="" class="input-add-product" style="margin-left: 17px">
                            <option value="0" >Electrodomésticos</option>
                            <?php 
                            $appliances = '21';
                                $sql = $conn->prepare("SELECT id_subcategoria, titulo_subcategoria FROM subcategorias WHERE id_categoria_subcategoria = ? ORDER BY titulo_subcategoria ASC");
                                $sql->bind_param("i", $appliances);
                                $sql->execute();
                                $result = $sql->get_result();
                                if ($result) {
                                    while ($row = $result->fetch_array()) {
                            ?>
                            <option value="<?php echo $row['id_subcategoria']?>"><?php echo $row['titulo_subcategoria']?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select><br><br>
                    </div>
                    <div id="sizes" class="sizes">
                        <div class="form-control-add-product ">
                            <label class="sizes-label">Seleccione tallas disponibles (mx)*:</label>
                            <div class="sizes-shoes">
                                <input type="text" name="" value= "25.0" onclick="size()" class="size" id="size">
                                <input type="" name="" value= "25.5" class="size">
                                <input type="" name="" value= "26.0" class="size">
                                <input type="" name="" value= "26.5" class="size">
                                <input type="" name="" value= "27.0" class="size">
                                <input type="" name="" value= "27.5" class="size">
                                <input type="" name="" value= "28.0" class="size">
                                <input type="" name="" value= "28.5" class="size">
                                <input type="" name="" value= "29.0" class="size">
                                <input type="" name="" value= "29.5" class="size">
                                <input type="" name="" value= "30.0" class="size">
                                <input type="" name="" value= "30.5" class="size">
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-control-add-product" style="margin-top: -20px;">
                        <label for="">Descripción del producto:</label>
                        <textarea name="descripcion_producto" id="" cols="30" rows="10" class="input-add-product" style="height: 350px;"
                        value="<?php echo isset($_POST['descripcion_producto']) ? htmlspecialchars($_POST['descripcion_producto']) : '';?>"><?php echo isset($_POST['descripcion_producto']) ? htmlspecialchars($_POST['descripcion_producto']) : '';?></textarea>    
                    </div>
                </div>            
            </div>
            <div class="information-add-products" id="sales">
                <div class="info-form-add-products">
                    <h3>Información de ventas.</h3>
                    <br>
                    <div class="form-control-add-product">
                        <label for="">Precio del producto:</label>
                        <input type="number" name="precio_producto" class="input-add-product"
                        value="<?php echo isset($_POST['precio_producto']) ? htmlspecialchars($_POST['precio_producto']) : '';?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Existencia del producto:</label>
                        <input type="number" name="existencia_producto" class="input-add-product"
                        value="<?php echo isset($_POST['existencia_producto']) ? htmlspecialchars($_POST['existencia_producto']) : '';?>"><br><br>
                    </div>
                </div>
            </div>
            <div class="information-add-products" id="shipment">
                <div class="info-form-add-products">
                    <h3>Información de envio.</h3>
                    <br>
                    <div class="form-control-add-product">
                        <label for="">País de origen:</label>
                            <?php
                                $id = $_SESSION['id_usuario'];
                                $sql = $conn->query("SELECT paisEmpresa_vendedor FROM vendedores WHERE id_usuario_vendedor = '$id'");
                                if ($sql) {
                                    if ($row = mysqli_fetch_array($sql)) {
                                        $contry = $row['paisEmpresa_vendedor'];
                                    }
                                }
                            ?>
                            <input type="text" class="input-add-product contry-seller-input" name="pais_origen_producto" value="<?php echo $contry; ?>">
                        <br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Costo de envio:</label>
                        <input type="number" name="costo_envio_producto" class="input-add-product"
                        value="<?php echo isset($_POST['costo_envio_producto']) ? htmlspecialchars($_POST['costo_envio_producto']) : '';?>"><br><br>
                    </div>
                    
                    <div class="form-control-add-product">
                        <label for="">Descuento del producto (%):</label>
                        <input type="number" name="descuento_producto" class="input-add-product"
                        value="<?php echo isset($_POST['descuento_producto']) ? htmlspecialchars($_POST['descuento_producto']) : '';?>"><br><br>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Peso del producto, especifica->(g,kg):</label>
                        <input type="text" name="peso_producto" class="input-add-product"
                        value="<?php echo isset($_POST['peso_producto']) ? htmlspecialchars($_POST['peso_producto']) : '';?>"><br><br>
                    </div>
                    <div class="form-control-add-product package_size">
                        <label for="">Tamaño del paquete (cm):</label>
                        <input type="number" name="ancho_producto" class="input-add-product" placeholder="Ancho"
                        value="<?php echo isset($_POST['ancho_producto']) ? htmlspecialchars($_POST['ancho_producto']) : '';?>">
                        <input type="number" name="largo_producto" class="input-add-product" placeholder="Largo"
                        value="<?php echo isset($_POST['largo_producto']) ? htmlspecialchars($_POST['largo_producto']) : '';?>">
                        <input type="number" name="alto_producto" class="input-add-product" placeholder="Alto"
                        value="<?php echo isset($_POST['alto_producto']) ? htmlspecialchars($_POST['alto_producto']) : '';?>">
                    </div>
                </div>
            </div>
            <div class="information-add-products" id="other">
                <div class="info-form-add-products">
                    <h3>Información extra.</h3>
                    <br>
                    <div class="form-control-add-product">
                        <label for="">Preventa:</label>
                        <div class="presale">
                            <label for="">Si</label>
                            <input type="radio" name="preventa_producto" value="si">
                        </div>
                        <div class="presale">
                            <label for="">No</label>
                            <input type="radio" name="preventa_producto" value="no">
                        </div>
                    </div>
                    <div class="form-control-add-product">
                        <label for="">Condición:</label>
                        <select class="input-add-product" name="condicion_producto">
                            <option value="Seleccione la condicion">Seleccione la condicion</option>
                            <option value="Nuevo">Nuevo</option>
                            <option value="Seminuevo">Seminuevo</option>
                        </select>
                        <br><br>
                    </div>
                    <div class="form-control-add-product">
                        <input type="submit" class="input-add-product btn-add-product" value="Cancelar" name="cancelar">
                        <input type="submit" class="input-add-product btn-add-product" value="Guardar" name="guardar">
                        <input type="submit" class="input-add-product btn-add-product" value="Guardar y publicar" name="publicar">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo SERVERURL ?>views/js/alerts.js"></script>
<?php
    require_once '../../components/scripts.php';
?>