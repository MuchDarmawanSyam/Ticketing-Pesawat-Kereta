<!-- Load App -->
<?php require_once ("app.php"); ?>

<!-- Fungsi Untuk Menampilkan Data -->
<?php 
    $data_petugas = $crud->read('petugas'); 
    $data_petugas_aktif = $crud->read('petugas');
?>

<!-- Fungsi Untuk Mendeteksi User Valid -->
<?php $_SESSION['login_status'] == TRUE ? TRUE : header("location: login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SamehadaAdmin - Manage Officers</title>
  
  <!-- Load File CSS -->
  <?php include("Assembly_srcs/srcs - css.php"); ?>

</head>

<body id="page-top">

  <!-- Load Navbar -->
  <?php include("Assembly_srcs/srcs - navbar.php"); ?>

  <div id="wrapper">

    <!-- Load Sidebar -->
    <?php include("Assembly_srcs/srcs - sidebar.php"); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Manage Officers</li>
        </ol>

        <!-- DataTables Petugas Aktif -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Petugas Aktif</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Level Access</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Level Access</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                
              <?php 
              while($petugas = $data_petugas_aktif->fetch_assoc()){ 
              ?>
                  <tr>
                    <td><?= $petugas['nama_petugas']; ?></td>
                    <td><?= $petugas['id_level']; ?></td>
                    <td><center><img src="img/profil-admin/<?= $petugas['img_profil_petugas']; ?>" alt="" height="100" width="100"></center></td>
                    <td>Aksi</td>
                  </tr>
              <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>


        <!-- DataTables Semua Petugas -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Semua Petugas</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Level Access</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Level Access</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                
              <?php 
              while($petugas = $data_petugas->fetch_assoc()){
              ?>
                  <tr>
                    <td><?= $petugas['nama_petugas']; ?></td>
                    <td><?= $petugas['id_level']; ?></td>
                    <td><center><img src="img/profil-admin/<?= $petugas['img_profil_petugas']; ?>" alt="" height="100" width="100"></center></td>
                    <td>
                        <!-- Kode Akses -->
                        <?php $UserCode = sha1($_SESSION['login_user']); ?>
                        <a href="entries-formEditOfficer.php?Officer=<?= $petugas['id_petugas']; ?>&usr=<?= $UserCode; ?>" class="btn btn-success btn md">Edit</a>
                    </td>
                  </tr>
              <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    
      <!-- Tombol Add -->
      <div class="container">
        <div class="float-right mb-3">
            <a href="#addOfficer" class="btn btn-md btn-primary" data-toggle="modal" data-target="#formAddOfficer">
                <span>
                    <i class="fa fa-plus"></i>
                </span>
                New
            </a>
        </div>
      </div>

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Much Darmawan Iriansyah Syam <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Load Logout Modal-->
  <?php include("Assembly_srcs/srcs - modals.php"); ?>

  <!-- Load File JS -->
  <?php include("Assembly_srcs/srcs - js.php"); ?>
  <script>
      $('#dataTable2').dataTable();
  </script>
  <?php include("Assembly_srcs/srcs - alerts.php"); ?>
  

</body>
</html>
