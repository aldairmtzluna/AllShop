<?php
require_once "../config/conn.php";
if (isset($_POST["registrarse"])) {
    $name = $_POST["nombre_usuario"];
    $email = $_POST["correo_usuario"];
    $phone = $_POST["telefono_usuario"];
    $user = $_POST["usuario_usuario"];
    $pass = $_POST["contraseña_usuario"];
    $date = date('Y-m-d H:i:s');

    if (empty($name) || empty($email) || empty($phone) || empty($user) || empty($pass)) {
        mostrarAlerta("Todos los campos son obligatorios");
    } else if (!is_numeric($phone)) {
        mostrarAlerta("El teléfono debe ser numérico, inténtelo de nuevo");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        mostrarAlerta("El correo que ingresó no es válido, inténtelo de nuevo");
    } else {
        // Verificar que el correo, el teléfono y el usuario no existan previamente en la base de datos
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo_usuario = ? OR telefono_usuario = ? OR usuario_usuario = ?");
        $stmt->bind_param("sss", $email, $phone, $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["correo_usuario"] === $email) {
                    mostrarAlerta("El correo que ingresó ya existe, inténtelo de nuevo.");
                } elseif ($row["telefono_usuario"] === $phone) {
                    mostrarAlerta("El teléfono que ingresó ya existe, inténtelo de nuevo.");
                } elseif ($row["usuario_usuario"] === $user) {
                    mostrarAlerta("El nombre de usuario que ingresó ya existe, inténtelo de nuevo.");
                }
            }
        } else {
            // Hash seguro de la contraseña utilizando bcrypt
            $password= password_hash($pass, PASSWORD_BCRYPT);

            // Insertar el nuevo usuario en la base de datos utilizando una consulta preparada
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, correo_usuario, telefono_usuario, usuario_usuario, perfil_usuario, contraseña_usuario, fecha_creacion_usuario)
                VALUES (?, ?, ?, ?, 'notPerfil.png', ?, ?)");
            $stmt->bind_param("ssssss", $name, $email, $phone, $user, $password, $date);
            $stmt->execute();

            if ($stmt->affected_rows === 1) {
                mostrarAlerta("Usuario registrado con éxito", "../user/login");
            } else {
                mostrarAlerta("Error al registrar el usuario, inténtelo de nuevo");
            }
        }
    }
}

mysqli_close($conn);   




    

