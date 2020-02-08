<!--Modal PreOrder-->
	<div id="modal-order" class="modal">
		<form action="config/c-order.php" method="POST">
			<div class="modal-content">
				<h4 class="center green-text text-darken-4">Order Tiket</h4>			
			<div>
					<!-- <input type="text" name> BIKIN INPUTAN HIDDEN -->

					<input type="hidden" name="kode_pemesanan" value="">
			</div>
			</div>
			<div class="modal-footer">
						<label for="" class="verification-form">Konfirmasi Password :</label>
						<input type="text" name="password" placeholder="Konfirmasi Password" style="width: 250px; margin-right: 30px; margin-top: -15px;" class="verification-form" required="required">
				
				<?php if ($_SESSION['status-preorder'] == 'PreOrder Verified'){ ?>
						<input type="submit" name="btnLogin" value="Order" class="btn-flat waves-effect waves-light green darken-1">
				<?php } ?>
						<a id="btn-form-show" class="btn-flat waves-effect waves-light blue lighten-1">Order</a>
			</div>
		</form>
	</div>