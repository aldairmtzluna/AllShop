<?php
	session_start();
	if (empty($_SESSION['id_usuario'])) {
		header("location: ../");
	}
	require_once "../../config/conn.php";
	require_once "../../config/APP.php";
	require_once "../components/head.php";
	$iucrt = $_GET['iucrt'];
	$id_user = $_SESSION['id_usuario'];
    $sql = $conn->prepare("SELECT COUNT(id_carrito) as total FROM carritos WHERE id_usuario_carrito = ?");
    $sql->bind_param("s", $id_user);
    $sql->execute();
    $result = $sql->get_result();
    if ($result) {
        $row = $result->fetch_assoc();
    }
?>
<header class="header-cart">
	<div class="container-header-cart">
		<p>Carrito (<?php echo $row['total']?>)</p>
		<img src="<?php echo SERVERURL ?>views/img/icons/list.png" alt="list-icon-allshop">
	</div>
</header>
<div class="cart-info">
	<div class="container-cart">
		<?php 
			$sqlCart = $conn->prepare("SELECT a.*, b.*, c.*, d.*,
                                    SUBSTRING_INDEX(b.fecha_creacion_producto, '-', 1) AS año,
                                    SUBSTRING_INDEX(b.foto_uno_producto, '_', 1) AS mes
                                    FROM carritos AS a 
                                    INNER JOIN productos AS b ON a.id_producto_carrito = b.id_producto
                                    INNER JOIN usuarios AS c ON b.id_usuario_producto = c.id_usuario
                                    INNER JOIN vendedores AS d ON c.id_usuario = d.id_usuario_vendedor
                                    WHERE a.id_usuario_carrito = ?
                                    ORDER BY id_carrito DESC");
            $sqlCart->bind_param("i", $iucrt);
            $sqlCart->execute();
            $resultCart = $sqlCart->get_result();
            $finalTotal = 0;
            if ($resultCart) {
                while ($rowCart = $resultCart->fetch_array()) {
		            $price = $rowCart['precio_producto'];
		            $cant = $rowCart['cantidad_carrito'];
		            $discount = $rowCart['descuento_producto'];
		            $discountCant = $price * $cant;
		            $total = $price - $price * ($discount / 100);
		            $cantPrice = $total * $cant;
                    $formattedTotal = number_format($cantPrice, 2, '.', '');
                    $finalTotal += $cantPrice;
                    $totalFinal = number_format($finalTotal, 2, '.', '');
		?>
		<form method="POST" action="<?php echo SERVERURL ?>controllers/deleteCartController.php">
			<div class="container-info-products-cart">
				<div class="info-products-cart">
					<input type="hidden" name="idCart" value="<?php echo $rowCart['id_carrito']?>">
					<div class="container-radio-cart">
						<button class="radio-cart"  name="delteCart" id="delte-cart" title="Eliminar del carrito">
							<img src="<?php echo SERVERURL ?>views/img/icons/trash.png" alt="delete-cart-allshop">
						</button>
					</div>
				</div>
				<div class="info-products-cart">
					<div class="container-img-products-cart">
						<img src="<?php echo SERVERURL ?>views/sellers/dashSeller/products/<?php echo $rowCart['id_usuario_producto']?>/<?php echo $rowCart['año']?>/<?php echo $rowCart['mes']?>/<?php echo $rowCart['nombre_producto']?>/<?php echo $rowCart['foto_uno_producto']?>">
					</div>
				</div>
				<div class="info-products-cart">
					<div class="info-product-cart">
						<div class="info-products-container">
							<p><?php echo $rowCart['nombre_producto']?>.</p>
						</div>
						<div class="info-products-container">
							<p>Vendio por</p>
							<img src="<?php echo SERVERURL ?>views/img/perfiles/<?php echo $rowCart['perfil_usuario']?>">
							<a href=""><b><p class="seller-product-cart"><?php echo $rowCart['tiendaNombre_vendedor']?></p></b>></a>
						</div>
						<div class="info-products-container">
							<select>
								<option>Seleccione</option>
							</select>
						</div>
						<div class="info-products-container">
							<b><p>Ahora cuesta $ .00 MXN menos del costo inicial.</p></b>
						</div>
						<div class="info-products-container">
							<b><p id="Finalprice">$<?php echo $formattedTotal?> MXN</p></b>
                   			<h2 class="original-price">$<?php echo $discountCant?>.00 MXN</h2><div class="price-hr"></div>			
						</div>
					</div>
				</div>
				<div class="info-products-cart">
					<div class="number-product-cart">
						<p>Cantidad</p>
						<input type="number" min="1" max="<?php echo $rowCart['existencia_producto']?>" pattern="^[0-9]+" name="" value="<?php echo $rowCart['cantidad_carrito']?>" id="cantidad">
					</div>
				</div>
			</div>
		</form>
		<?php 
			}
		}
		?>
	</div>
</div>
<div class="final-info-cart">
	<div class="container-final-info-cart">
		<div class="final-cart-price">
			<p>Subtotal:</p>
			<p class="blue-price-cart">$</p>
			<input type="text" name="" value="<?php echo $totalFinal?>">
			<p class="blue-price-cart">MXN</p>
			<p class="p-price"> ^</p>
		</div>
		<div class="final-cart-price">
			<button>Continuar compra.</button>
		</div>
	</div>
</div>

<script src="<?php echo SERVERURL ?>views/js/scripts.js"></script>
<?php
	require_once "../components/footer.php";