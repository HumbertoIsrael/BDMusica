<div class="articulos grey lighten-5 z-depth-1">
	<div class="articulos_cont">
		<div class="row">
			<div class="col s6 valign-wrapper">
				<h6>Nombre de Articulo</h6>
			</div>
			<div class="col s2 valign-wrapper">
				<h6>Cantidad</h6>
			</div>
			<div class="col s2 valign-wrapper">
				<h6>Precio</h6>
			</div>
			<div class="col s2 valign-wrapper">
				
			</div>
		</div>
		<div class="divider"></div>
		<div class="itemsCont">
		<?php
			if(!isset($_SESSION['arregloItems'])){
				?>
				<div class="row">
					<div class="col s8 valign-wrapper">
						<h6>No ha marcado ningun item</h6>
					</div>
				</div>
				<?php
			} else {
				foreach ($_SESSION['arregloItems'] as &$item) {
		            ?>
		            <div class="col s6 valign-wrapper">
		                <p><?php echo $item["producto"]; ?></p>
		            </div>
		            <div class="col s2 valign-wrapper">
		                <p><?php echo $item["cantidad"]; ?></p>
		            </div>
		            <div class="col s2 valign-wrapper">
		                <p>$<?php echo $item["precio"]; ?></p>
		            </div>
		            <div class="col s2 valign-wrapper">
		                <p>
		                    <button class="cyan darken-1 waves-effect waves-light btn" type="submit" onclick="return removerItem(<?php echo $item['idProducto']; ?>);" >Eliminar</button></p>
		            </div>
		            <?php
		        }
			}
		?>
		</div>
	</div>
	<div class="articulos_tot">
		<div class="row">
			<div class="col s2 offset-s6">
				<h6 style="float: right;">Total:</h6>
			</div>
			<div class="col s2 valign-wrapper">
				<h6>
					$
					<?php 
					if(!isset($_SESSION['total'])){
						echo "--";
					} else {
						if(empty($_SESSION['arregloItems'])){
							echo "--";
						} else {
							echo $_SESSION['total'];
						}
					}
					?>
				</h6>
			</div>
		</div>
	</div>
</div>