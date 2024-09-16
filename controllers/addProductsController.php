<?php 
    session_start();
  if (isset($_POST['publicar']) || isset($_POST['guardar'])) {
    if (empty($_FILES['foto_uno_producto']) && empty($_FILES['foto_dos_producto']) && empty($_FILES['foto_tres_producto']) && 
        empty($_FILES['foto_cuatro_producto']) && empty($_POST['nombre_producto']) && empty($_POST['modelo_producto']) ||
        empty($_POST['descripcion_producto']) && empty($_POST['precio_producto']) && empty($_POST['existencia_producto']) ||
        empty($_POST['peso_producto']) && empty($_POST['ancho_producto']) && empty($_POST['largo_producto']) && 
        empty($_POST['alto_producto']) && empty($_POST['preventa_producto']) &&  empty($_POST['condicion_producto'])) {
        mostrarAlerta("Todos los campos son obligatorios.");
    } else {
        if (empty($_FILES['foto_uno_producto']) or empty($_FILES['foto_dos_producto']) or empty($_FILES['foto_tres_producto'])
        or empty($_FILES['foto_cuatro_producto'])) {
            mostrarAlerta("Todas las fotos son obligatorias.");
        } else if (empty($_POST['nombre_producto'])) {
            mostrarAlerta("El nombre del producto es obligatorio.");
        } else if (empty($_POST['modelo_producto'])) {
            mostrarAlerta("El modelo del producto es obligatorio.");
        } else if ($_POST['categoria_producto'] == 'Establezca la categoria') {
            mostrarAlerta("Establezca la categoria del producto.");
        } else if (empty($_POST['descripcion_producto'])) {
            mostrarAlerta("La descripción del producto es obligatoria.");
        } else if (empty($_POST['precio_producto'])) {
            mostrarAlerta("El precio del producto es obligatorio.");
        } else if (empty($_POST['existencia_producto'])) {
            mostrarAlerta("La existencia del producto es obligatoria.");
        } else if (empty($_POST['peso_producto'])) {
            mostrarAlerta("El peso del producto es obligatorio.");
        } else if (empty($_POST['ancho_producto']) || empty($_POST['largo_producto']) || empty($_POST['alto_producto'])) {
            mostrarAlerta("El tamaño del paquete es obligatorio.");
        } else if (empty($_POST['preventa_producto'])) {
            mostrarAlerta("Especifica si tu producto tendra preventa.");
        } else if ($_POST['condicion_producto'] == 'Seleccione la condicion') {
            mostrarAlerta("Especifica la condición de tu producto.");
        } else {
            $photoOne = $_FILES['foto_uno_producto'];
            $photoTwo = $_FILES['foto_dos_producto'];
            $photoThree = $_FILES['foto_tres_producto'];
            $photoFour = $_FILES['foto_cuatro_producto'];
            $video = $_FILES['video'];

            $month = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'][date('n')-1];
            $year = strftime('%Y');
            $date = date('Y-m-d H:i:s');
            $randomNum = mt_rand(1000, 9999);
            $randomNumTwo = mt_rand(1000, 9999);
            $randomNumThree = mt_rand(1000, 9999);
            $randomNumFour = mt_rand(1000, 9999);
            $randomVideo = mt_rand(1000, 9999);

            //SE EXTRAEN LAS EXTENCIONES DE CADA UNO DE LOS ARCHIVOS
            if (isset($_FILES['foto_uno_producto']['name']) && isset($_FILES['foto_dos_producto']['name']) &&
            isset($_FILES['foto_tres_producto']['name']) && isset($_FILES['foto_cuatro_producto']['name'])) {

                $ext1 = pathinfo($_FILES['foto_uno_producto']['name'], PATHINFO_EXTENSION);
                $ext2 = pathinfo($_FILES['foto_dos_producto']['name'], PATHINFO_EXTENSION);
                $ext3 = pathinfo($_FILES['foto_tres_producto']['name'], PATHINFO_EXTENSION);
                $ext4 = pathinfo($_FILES['foto_cuatro_producto']['name'], PATHINFO_EXTENSION);
                

                //SE CREAN LOS NOMBRES QUE SE VAN A GUARDAR EN LA BASE DE DATOS DE CADA ARCHIVO

                $nameOne = $month.'_'.$year.'_'.$randomNum.'_producto.'.$ext1;
                $nameTwo = $month.'_'.$year.'_'.$randomNumTwo.'_producto.'.$ext2;
                $nameThree = $month.'_'.$year.'_'.$randomNumThree.'_producto.'.$ext3;
                $nameFour = $month.'_'.$year.'_'.$randomNumFour.'_producto.'.$ext4;
            }if (isset($_FILES['video'])) {
                $extVideo = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                $nameVideo = $month.'_'.$year.'_'.$randomVideo.'_video_producto.'.$extVideo;
            }if (empty($_FILES['video'])){
                $nameVideo = 'Sin video';
            }

            //SE CREAN LAS VARIABLES PARA CADA UNO DE LOS CAMPOS

            $productName = $_POST['nombre_producto'];
            $productModel = $_POST['modelo_producto'];
            $productCategory = $_POST['categoria_producto'];
            $productDescription = $_POST['descripcion_producto'];
            $productPrice = $_POST['precio_producto'];
            $productStock = $_POST['existencia_producto'];
            $productContry = $_POST['pais_origen_producto'];
            $productCost = $_POST['costo_envio_producto'];
            $productDiscount = $_POST['descuento_producto'];
            $productWeight = $_POST['peso_producto'];
            $productWidth = $_POST['ancho_producto'];
            $productLarge = $_POST['largo_producto'];
            $productHigh = $_POST['alto_producto'];
            $productPresale = $_POST['preventa_producto'];
            $productCondition = $_POST['condicion_producto'];
            $status = "1";
            $idUser = $_SESSION['id_usuario'];

            $productName = str_replace('"', '', $productName);
            $productModel = str_replace('"', '', $productModel);
            $productDescription = str_replace('"', '', $productDescription);

            //SE REALIZA LA CONSULTA DE INSERCION DE DATOS

            $sql = $conn->query ("INSERT INTO productos (foto_uno_producto, foto_dos_producto, foto_tres_producto, foto_cuatro_producto, 
                    video_producto, nombre_producto, modelo_producto, id_categoria_producto, descripcion_producto, precio_producto, 
                    existencia_producto, pais_origen_producto, costo_envio_producto, descuento_producto, peso_producto, ancho_producto, 
                    largo_producto, alto_producto,	preventa_producto, condicion_producto,	status_producto, id_usuario_producto, 
                    fecha_creacion_producto) VALUES ('$nameOne', '$nameTwo', '$nameThree', '$nameFour', '$nameVideo',
                    '$productName', '$productModel', '$productCategory', '$productDescription', '$productPrice', '$productStock', '$productContry', 
                    '$productCost', '$productDiscount', '$productWeight', '$productWidth', '$productLarge', '$productHigh', '$productPresale', 
                    '$productCondition', '$status','$idUser', '$date')");

            //RUTA DONDE SE LOJARAN LAS IMAGENES DE LOS PRODUCTOS, Y SE CREAN LOS DIRECTORIOS
            $server = str_replace('\\', '/', dirname(__DIR__));
            $root = $server . '/views/sellers/dashSeller/products/';

            if (!is_dir($root)) {
                mkdir($root, 0777, true);
            }
            
            $idDirectory = $root . $_SESSION['id_usuario'];
            
            if (!is_dir($idDirectory)) {
                mkdir($idDirectory, 0777, true);
            }
            
            $yearDirectory = $idDirectory . '/' . $year;
            
            if (!is_dir($yearDirectory)) {
                mkdir($yearDirectory, 0777, true);
            }
            
            $monthDirectory = $yearDirectory . '/' . $month;
            
            if (!is_dir($monthDirectory)) {
                mkdir($monthDirectory, 0777, true);
            }

            $nameProductDirectory = $monthDirectory . '/' . $productName;
            
            if (!is_dir($nameProductDirectory)) {
                mkdir($nameProductDirectory, 0777, true);
            }
            
            $route = $nameProductDirectory;
            

            if (!empty($nameOne)) {
                $completeRoute = $route . '/' . $nameOne;
                $archiveTemporalOne = $photoOne['tmp_name'];
                if (move_uploaded_file($archiveTemporalOne, $completeRoute)) {
                    // La imagen uno se movió correctamente
                }
            }

            if (!empty($nameTwo)) {
                $completeRoute = $route . '/' . $nameTwo;
                $archiveTemporalTwo = $photoTwo['tmp_name'];
                if (move_uploaded_file($archiveTemporalTwo, $completeRoute)) {
                    // La imagen dos se movió correctamente
                }
            }

            if (!empty($nameThree)) {
                $completeRoute = $route . '/' . $nameThree;
                $archiveTemporalThree = $photoThree['tmp_name'];
                if (move_uploaded_file($archiveTemporalThree, $completeRoute)) {
                    // La imagen tres se movió correctamente
                }
            }

            if (!empty($nameFour)) {
                $completeRoute = $route . '/' . $nameFour;
                $archiveTemporalFour = $photoFour['tmp_name'];
                if (move_uploaded_file($archiveTemporalFour, $completeRoute)) {
                    // La imagen cuatro se movió correctamente
                }
            }

            if (!empty($nameVideo)) {
                $completeRoute = $route . '/' . $nameVideo;
                $archiveTemporalVideo = $video['tmp_name'];
                if (move_uploaded_file($archiveTemporalVideo, $completeRoute)) {
                    // La imagen cuatro se movió correctamente
                }
            }

            if ($sql) {
                mostrarAlerta("Producto publicado con éxito.", '../../user/seller/my-products');
            } else {
                // Mostrar el error específico de MySQL
                $errorMsg = $conn->error;  // Captura el mensaje de error de MySQL
                mostrarAlerta("Error al publicar el producto: $errorMsg", './user/seller/add-products');
            }

        }
    }if (isset($_POST['cancelar'])) {
        echo "<script>
                window.location = '../user/seller/add-products';
            </script>";
    } 
        
}
