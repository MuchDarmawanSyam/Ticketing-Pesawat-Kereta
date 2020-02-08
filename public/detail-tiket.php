<?php
	session_start();
	error_reporting(1);
	require_once "core/execute.php";

	$pesawat = $core->tiket_khusus(1);
	$kereta = $core->tiket_khusus(2);

	//Dapatkan Id Tiket/Rute
	$id = $_GET['id'];

	//JalanKan Detail Tiket
	$get_tiket = $core->get_tiket($id);
	
	//Dapatkan Id Transportasi
	$id_trn = $get_tiket['id_transportasi'];

	//Jalankan Detail Tiket (Kode Transportasi)
	$get_kode_trans = $core->get_trans($id_trn);

	//Dapatkan Tanggal
	$date = date("Y-m-d");

	//Dapat Id User
	$get_id = $user->get_all_data_user($_SESSION['id']);
	$id_user = $get_id['id_penumpang'];

	//$session->null();
	//$session->set_status("logged");


	//=============SCRIPT PENUNJANG=========================//
		//$session->null();
		//$session->logout();
	$status_login = isset($_SESSION['status']);
	$id_login = isset($_SESSION['id']);

	
	//Get All Data User Dengan Fungsi error_reporting
	$get_all = $user->get_all_data_user($_SESSION['id']);
	$id_img_p = $get_all['id_img_profil_penumpang'];
	$id_img = $user->get_img_user($id_img_p);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tickects - Detail Tiket <?php echo $id; ?></title>
	<link rel="stylesheet" href="asset/library/custom/custom.css">
	<link rel="stylesheet" href="asset/library/materialize/css/materialize.css">
	<link rel="stylesheet" href="asset/library/assets/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="asset/library/assets/css/font-awesome.min.css">
</head>
<body>

	<!--Navbar-->
	<nav>
		<div class="nav-wrapper teal">
			<a href="index.php" class="brand-logo fix-logo">SamehadaTiket.net</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li>
					<div class="kotak_wktu_nav">
						<div class="kotak_wktu">
							<p id="jam"></p>
						</div> :
						<div class="kotak_wktu">
							<p id="menit"></p>
						</div> :
						<div class="kotak_wktu">
							<p id="detik"></p>
						</div>
					</div>
				</li>
				<li><a href="#" class="waves-effect waves-light "></a></li>
				<li><a href="list-tiket.php" class="waves-effect waves-light"><span class="ti ti-view-list-alt"></span></a></li>
				
				<?php
				if ($status_login !== true){
				?>
				<li><a class="waves-effect waves-light modal-trigger" href="#modal1"><span class="fa fa-user-times"></span></a></li>
				<?php 
				}else{
				?>
				<li><a class="waves-effect waves-light modal-trigger" href="#modal2"><span class="fa fa-user"></span></a></li>
				<?php  
				}
				?>
			</ul>
		</div>
	</nav>


	<?php require_once "alerts.php"; ?>


	<!--DETAIL TIKET-->
	<div class="card-custom-det">
		<br>
		<div>
			<h4 class="text-detail-fix"><b>DETAIL TIKET</b></h4>
				<hr class="hr-detail-fix">
				<div class="detail-isi-fix">
					<div>
						<b>From &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><b><i><?php  echo $get_tiket['asal']; ?></i></b>
					</div>
					<div>
						<b>To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><b><i><?php echo $get_tiket['tujuan']; ?></i></b>
					</div>
					<div>
						<b>Routes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b><b><i><?php echo $get_tiket['rute_awal']; echo " - "; echo $get_tiket['rute_akhir']; ?></i></b>
					</div>
					<div>
						<?php  
							if ($get_tiket['id_transportasi'] == 1){
						?>
						<b>Type of Transportation &nbsp;&nbsp;: <i><?php echo "PESAWAT TERBANG"; ?></i></b>
						<?php  
							}else{
						?>
						<b>Type of Transportation &nbsp;&nbsp;: <i><?php echo "KERETA API"; ?></i></b>
						<?php
							}
						?>
					</div>
					<div>
						<b>Codes of Transportation : <i><?php echo $get_kode_trans['kode']; ?></i></b>
					</div>
					<div>
						<b>Available Tickets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <i><?php echo "300"; ?></i></b>
					</div>
					<div>
						<b>Departure &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <i><?php echo str_replace(":", ".", substr($get_tiket['jam_berangkat'], 0, 5)); ?> WIT</i></b>
					</div>
					<div>
						<b>Check In &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <i><?php echo $crud_pt->to_checkin($get_tiket['jam_berangkat']); ?> WIT</i></b>
					</div>
					<div>
						<b>Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <i>Rp. <?php echo $crud_pt->formal_price($get_tiket['harga']); ?>, -</i></b>
					</div>
				</div>
				<form action="config/c-cart.php" method="POST">
					<?php  

						if ($status_login !== true)
						{
					?>
							<a href="#modal1" class="btn red darken-4 fix-cart-pos modal-trigger">
								Add to Cart
							</a>

							<a href="#modal1" class="btn green darken-4 fix-order-pos modal-trigger">
								Pre Order Tiket
							</a>
							<p class="red-text text-darken-3 fix-text-order-pos">Must Login First &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Must Login First</p>

					<?php  
						}else{
					?>
					<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
					<input type="hidden" name="id_rute_cart" value="<?php echo $id; ?>">
					<br>
					<input type="hidden" name="date_cart" value="<?php echo $date; ?>">

					<input type="submit" name="btnAddCart" class="btn red darken-4 fix-cart-pos" value="Add to Cart">

					<a href="#modal-order" class="btn green darken-4 fix-order-pos modal-trigger">
								Pre Order Tiket
					</a>
				
					<?php  
					}
					?>

				</form>
		</div>
	</div>
	<br>
	<br>




	<!--Footer-->
	<footer class="teal darken-2">
	<div class="footer-about-us fix-about">
		<h5><b>About SamehadaTiket.net</b></h5>
		<ul>
			<li>Alamat &nbsp;: Jalan Nusatenggara, Dok V Atas, Jayapura, Papua</li>
			<li>No Telp : 080000000</li>
			<li>Fax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: (052)00000</li>
			<li>Email &nbsp;&nbsp;&nbsp;&nbsp;: mchdarmawan@gmail.com</li>
		</ul>
	</div>
	<div class="footer-about-dev fix-about">
		<h5><b>About Developer</b></h5>
		<ul>
			<li>Much Darmawan Iriansyah Syam <a href="#modal3" class="modal-trigger"><i class="fa fa-info-circle icon-info-fix"></i></a></li>
			<li>Assembly Team</li>
			<li>XII RPL - C</li>
			<li>SMK Negeri 1 Jayapura</li>
		</ul>
	</div>
		<div class="footer-follow-us fix-about">
		<h5><b>Follow Us on</b></h5>
		<ul>
			<li>&nbsp;</li>
			<li>
				<a href="#facebook"><span class="ti ti-facebook fb-hover"></span></a>
				<a href="#instagram"><span class="ti ti-instagram ig-hover"></span></a>
				<a href="#twitter"><span class="ti ti-twitter tw-hover"></span></a>
			</li>
			<li>&nbsp;</li>
		</ul>
	</div>
	<hr style="color: white;">
	<div>
		<marquee scrollamount="2"><center><h6>COPYRIGHT &copy; 2019 - ORIGINAL DESIGN BY MUCH DARMAWAN</h6></center></marquee>
	</footer>


	<?php require_once "modals-order.php"; ?>
	

	<!--Modal Login-->
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4 class="center teal-text text-darken-3">LOGIN FORM</h4>			
		<div class="form-register-button">
			<a href="form-register.php">
				<i class="ti ti-user right fix-right-modal">+</i>
			</a>
		</div>
		<div>
			<form action="config/c-proses.php" method="POST">
				<div class="input-field col s6">
					<input type="text" name="username" id="username" class="validate">
					<label for="username">Username</label>
				</div>
				<div class="input-field col s6">
					<input type="password" name="password" id="password" class="validate">
					<label for="password">Password</label>
				</div>
				<div>
					<input type="checkbox" id="showpass">
					<span><label for="showpass" onclick="showpass()">Show Password</label></span>
				</div>
			<input type="submit" name="btnLogin" value="Login" class="btn-flat waves-effect waves-light blue lighten-1 login-submit-position">
			</form>
		</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-green red btn-flat white-text">Close</a>
		</div>
	</div>



<!--Modal Data User-->
	<div id="modal2" class="modal">
		<div class="modal-content">
			<h4 class="center teal-text text-darken-3">Profil User</h4>			
		<div class="">
			<a href="logout.php">
				<b><i class="red-text text-darken-2 right fix-right-modal">Logout</i></b>
			</a>
		</div>
		<div>
			<div>
				<div class="img-profile">
					<img class="img-profile-size" src="asset/database/img-profil/<?php echo $id_img['img_src']; ?>" alt="Your Profile">
				</div>
				<div class="pos-profile">
					Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['nama_penumpang']; ?></b>
					<br>
					Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['jenis_kelamin']; ?></b>
					<br>
					Tanggal-Lahir &nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['tanggal_lahir']; ?></b>
					<br>
					Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['alamat_penumpang']; ?></b>
					<br>
					No Telepone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['telefone']; ?></b>
					<br>
					No KTP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $get_all['no_ktp']; ?></b>
					<br>
					Username Akun : <b><?php echo $get_all['username']; ?></b>
					<br>
					Password Akun &nbsp;: <b><?php echo $get_all['password']; ?></b>
				</div>
			</div>
		</div>
		</div>
		<div class="modal-footer">
			<a href="form-edit-profil.php?id=<?php echo $get_all['id_penumpang']; ?>" class="btn-flat waves-effect waves-light blue darken-3 edit-fix-profile">
				<i class="white-text fa fa-pencil-square-o size-cart-profile"></i>
			</a>
			<a href="cart-tiket.php?id=<?php echo $get_all['id_penumpang']; ?>" class="btn-flat waves-effect waves-light red darken-3">
				<i class="white-text fa fa-cart-arrow-down size-cart-profile"></i>
			</a>
			<a href="#PreOrderTiket.php" class="waves-effect waves-green lime darken-2 btn-flat white-text">
				<i class="fa fa-sticky-note-o size-cart-profile"></i>
			</a>
		</div>
	</div>


	
	<!--Modal Data Developer-->
	<div id="modal3" class="modal">
		<div class="modal-content">
			<h4 class="center teal-text text-darken-3">Profil Developer</h4>
		<div>
			<div>
				<div class="img-profile">
					<img src="asset/database/img-profil/PROFIL-DEVELOPER.jpg" alt="Your Profile" class="img-profile-size">
				</div>
				<div class="pos-profile">
					<input type="text" value="082399541952" id="copywa" style="display: none;">
					Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>Much Darmawan Iriansyah Syam</b>
					<br>
					Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;: <b>Laki - Laki</b>
					<br>
					Tanggal-Lahir &nbsp;&nbsp;&nbsp;&nbsp;: <b>26, xxxxx, 2002</b>
					<br>
					Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>Jalan Tasangkapura No. 36</b>
					<br>
					No KTP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b> - </b>
					<br>
					Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b> XII RPL - C </b>
					<br>
					Jurusan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>Rekayasa Perangkat Lunak</b>
				</div>
			</div>
		</div>
		</div>
		<div class="modal-footer">
			<a href="https://www.facebook.com/much.d.s.1" target="blank" class="btn-flat waves-effect waves-light blue darken-3 edit-fix-profile">
				<i class="white-text fa fa-facebook-official size-cart-profile"></i>
			</a>
			<a href="https://www.instagram.com/mchdarma_syam/" target="blank" class="btn-flat waves-effect waves-light red darken-3">
				<i class="white-text fa fa-instagram size-cart-profile"></i>
			</a>
			<button onclick="copytext()" class="waves-effect waves-green green accent-4 btn-flat white-text">
				<i class="fa fa-whatsapp size-cart-profile"></i>
			</button>
		</div>
	</div>



	<script src="asset/library/jquery/jquery-3.3.1.min.js"></script>
	<script src="asset/library/materialize/js/materialize.min.js"></script>
	<script src="asset/library/custom/custom.js"></script>
	<script>

		$(document).ready(function (){
			$('.modal').modal();
			$('.slider').slider();

			//Fungsi Alert
			$('#alert').hide().fadeIn('slow');
			$('#alert-success').hide().fadeIn('slow');
			$('#alert-close').click(function(){
				$('#alert').fadeOut('slow');
			});
			$('#alert-close-success').click(function(){
				$('#alert-success').fadeOut('slow');
			});

			//Fungsi Halaman Detail
			$('.verification-form').hide();
			$('#btn-form-show').click(function() {
				$('.verification-form').show();
			});


			//Tulis Kode Program Sebelum Fungsi Ini
			$(window).setTimeout(time_now(), 1000);
		});
	</script>
</body>
</html>