<?php
require_once "../config/conn.php";
require_once "../config/APP.php";

$server = "http://localhost/allshop/";
$views = 'views/';
$sellers = 'sellers/';
$dashSeller = 'dashSeller/';
$products = 'products/';
$productInfo = 'product-info?asipip=';

$search = $_GET['search'];

$sql = $conn->prepare("SELECT *,
					SUBSTRING_INDEX(fecha_creacion_producto, '-', 1) AS año,
                    SUBSTRING_INDEX(foto_uno_producto, '_', 1) AS mes
                    FROM productos WHERE nombre_producto LIKE '%$search%'");
$sql->execute();
$result = $sql->get_result();
if ($result) {
	while ($row = $result->fetch_array()) {
		$asipip = $row['id_producto'];
		$name = $row['nombre_producto'];
		$asp = hash_hmac('sha1', $name, KEY_TOKEN);
		echo
		'<a href="'.$server.$products.$productInfo.$asipip.'&ASP='.$asp.'" class="a-row-results">'.
			'<div class="row-results">'.
				'<div class="container-results">'.
					'<img src="'. $server.$views.$sellers.$dashSeller.$products. $row['id_usuario_producto'] .'/'. $row['año'].'/'.$row['mes'].'/'. $row['nombre_producto'].'/'.$row['foto_uno_producto'].'"></img>'.
				'</div>'.
				'<div class="container-results">'. 
					'<p>' . $row['nombre_producto'] . '</p>' .
				'</div>'. 
			'</div>' .
		'</a>';
	}
}else {
	echo "No se encontraron resultados";
}