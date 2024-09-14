<?php

if (isset($_POST["entrar"])) {
    $user = $_POST["usuario_usuario"];
    $pass = $_POST["contraseña_usuario"];
    
    if (empty($user) && empty($pass)) {
        mostrarAlerta("¡Ingresa tu nombre de usuario y tu contraseña!");
    } elseif (empty($user)) {
        mostrarAlerta("¡Ingresa tu nombre de usuario!");
    } elseif (empty($pass)) {
        mostrarAlerta("¡Ingresa tu contraseña!");
    } else {
        // Ambos campos tienen datos, proceder con la verificación
        // Utilizo password_verify para verificar la contraseña
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE usuario_usuario = ?");
        $sql->bind_param("s", $user);
        $sql->execute();
        $result = $sql->get_result();

        if ($data = $result->fetch_object()) {
            if (password_verify($pass, $data->contraseña_usuario)) {
                $_SESSION["id_usuario"] = $data->id_usuario;
                $_SESSION["nombre_usuario"] = $data->nombre_usuario;
                $_SESSION["correo_usuario"] = $data->correo_usuario;
                $_SESSION["telefono_usuario"] = $data->telefono_usuario;
                $_SESSION["usuario_usuario"] = $data->usuario_usuario;
                $_SESSION["rol_usuario"] = $data->rol_usuario;
                $_SESSION["empresa_usuario"] = $data->empresa_usuario;
                $_SESSION["EstatusVendedor_usuario"] = $data->EstatusVendedor_usuario;
                $_SESSION["nacimiento_usuario"] = $data->nacimiento_usuario;
                $_SESSION["perfil_usuario"] = $data->perfil_usuario;

                echo "<script>window.location = '../user/seller/contry'</script>";
            } else {
                mostrarAlerta("El usuario o contraseña son incorrectos");
            }
        } else {
            mostrarAlerta("El usuario o contraseña son incorrectos");
        }
    }

?>
    <script>
        setTimeout(() => {
            window.history.replaceState(null, null, window.location.pathname);
        }, 0);
    </script>
    <?php
}

