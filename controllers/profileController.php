<?php
session_start();
require_once "../config/conn.php";
if (isset($_POST['profile'])) {
    if (isset($_POST['nombre']) && isset($_POST['perfil_usuario'])) {
        echo "<script> 
            alert ('campo vacio');
            window.location = '../user/profile';
        </script>";
    }else {
        $id = $_SESSION['id_usuario'];
        $userName = $_POST['usuario_usuario'];
        $name = $_POST['nombre_usuario'];

        $photo = $_FILES['perfil_usuario'];
        $namePhoto = $photo['name'];
        $type = $photo['type'];
        $urlTemp = $photo ['tmp_name'];
        $dateModify = date('Y-m-d H:i:s');

        if ($namePhoto != '') {
            $destiny = '../views/img/perfiles/';
            $imgName = 'img_'.md5(date('d-m-Y H:m;s'));
            $imgUser = $imgName.'.jpg';
            $src = $destiny.$imgUser;
        }

        $queryProfile = $conn->query("UPDATE usuarios SET usuario_usuario = '$userName', nombre_usuario = '$name', perfil_usuario = '$imgUser'
        fecha_modificacion_usuario = '$dateModify' WHERE id_usuario = '$id'");
    }if ($queryProfile) {
        echo "<script> 
            alert ('Modificado con exito');
            window.location = '../user/profile';
        </script>";
    }
}