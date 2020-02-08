<!-- Load App -->
<?php require_once ("app.php"); ?>
<!-- Fungsi Untuk Mendeteksi User Valid -->
<?php $_SESSION['login_status'] == TRUE ? TRUE : header("location: login.php"); ?>
<?php
    // +++ Fungsi Dapat Data +++
        // Dapatkan Kode Akses
        $idOfficer = $_GET['Officer'];
        $usr = $_GET['usr'];

        
        // Jika Tidak Memiliki / Kode Akses Tidak Valid
        if (sha1($_SESSION['login_user']) !== $usr){
            $_SESSION['status_operasi'] = FALSE;
            $_SESSION['msg'] = 'Anda Tidak Dapat Mengakses Halaman Ini';
            header("location: entries-manageOfficers.php");
        }

        // Data yang Telah Didapat
        $edit = $data->get('petugas', ['id_petugas' => $idOfficer]);
        $cpass = $data->get('petugas', ['username' => $_SESSION['login_user']]);
        
        // Pisahkan Nama Menjadi Nama Depan & Belakang
        

?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SamehadaAdmin - Form Edit Officer</title>
        
  <!-- Load File CSS -->
  <?php include("Assembly_srcs/srcs - css.php"); ?>
  <style>
      img{
          border-radius: 15%;
      }
  </style>

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header"><h4>Form Edit Profile</h4></div>
      <div class="card-body">
        <form action="Assembly_handlers/updateOfficer.php" method="POST" enctype="multipart/form-data">
            <p>Image Profile</p>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <img src="img/profil-admin/<?= $edit['img_profil_petugas']; ?>" alt="PROFIL-<?= $edit['nama_petugas']; ?>" class="col-md-12 col-lg-12">
                </div>
              </div>
              <div class="col-md-6">
                <input type="file" name="NewimgProfile" value="Browse Image" class="col-md-12 col-lg-12">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" name="newName" placeholder="Full Name" required="required" autofocus="autofocus" value="<?= $edit['nama_petugas']; ?>">
                  <label for="firstName">Full Name</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="inputPassword" class="form-control" name="newUsr" placeholder="Username" required="required"  value="<?= $edit['username']; ?>">
                  <label for="inputPassword">Username</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="Password" class="form-control" name="newPass" placeholder="Password" required="required" value="<?= $edit['password']; ?>">
                  <label for="Password">Password</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="confirmPassword" name="cpass" class="form-control" placeholder="Confirm Password" required="required" value="<?= $_SESSION['ket_operasi']; ?>">
                  <label for="confirmPassword">Confirm Your Password</label>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" name="btnUpdate" class="btn btn-primary btn-block" value="Update">
        </form>
      </div>
    </div>
  </div>

  <!-- Load File JS -->
  <?php include("Assembly_srcs/srcs - js.php"); ?>
  <?php include("Assembly_srcs/srcs - alerts.php"); ?>

</body>

</html>
