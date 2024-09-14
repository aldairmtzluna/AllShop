<?php
require_once "../config/conn.php";
require_once "../config/APP.php";
session_start();
if (empty($_POST['addCart'])) {
	$id = $_POST['product'];
	$date = date('Y-m-d H:i:s');
	$user = $_SESSION['id_usuario'];
	$iucrtu = password_hash($user, PASSWORD_BCRYPT);
	$cant = '1';

	$query = $conn->prepare("SELECT cantidad_carrito AS total FROM carritos WHERE id_producto_carrito = ?");
	$query->bind_param("i" , $id);
	$query->execute();
	$results = $query->get_result();
	if ($results) {
		$row = $results->fetch_assoc();
		$total = $row['total'] + 1;

		if ($total > 1) {
			$cartQuery = $conn->prepare("UPDATE carritos SET cantidad_carrito = ? WHERE id_producto_carrito = ?");
			$cartQuery->bind_param("ii", $total, $id);
			$cartQuery->execute();
			$cartResult = $cartQuery->get_result(); 
			if ($cartQuery) {
   				header('location:../user/cart?iucrt='.$user.'&iucrtu='.$iucrtu);	
			}
		
		}else {

		 	$sql = $conn->prepare("INSERT INTO carritos (cantidad_carrito, id_producto_carrito, id_usuario_carrito, fecha_crecion_carrito)
		 							VALUES (?,?,?,?)");
		    $sql->bind_param("iiis", $cant, $id, $user, $date);
		    $sql->execute();
		    $result = $sql->get_result();

		    if ($sql) {
		 		header('location:../user/cart?iucrt='.$user.'&iucrtu='.$iucrtu);	
		    }
		}
	}
}