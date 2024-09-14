<?php

require_once "../config/conn.php";
require_once "../config/APP.php";
session_start();

if (isset($_POST['delteCart'])) {
	$idCart = $_POST['idCart'];
	$user = $_SESSION['id_usuario'];
	$iucrtu = password_hash($user, PASSWORD_BCRYPT);
	$sql = $conn->prepare("DELETE FROM carritos WHERE id_carrito = ?");
	$sql->bind_param('i', $idCart);
	$sql->execute();
	$result = $sql->get_result();
	if ($sql) {
		header('location:../user/cart?iucrt='.$user.'&iucrtu='.$iucrtu);
	}
}