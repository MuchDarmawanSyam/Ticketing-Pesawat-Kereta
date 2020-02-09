<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SamehadaAdmin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" type="text/css" href="vendor/swal2/dist/sweetalert2.min.css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"><h2>Login</h2></div>
      <div class="card-body">

        <form action="Assembly_handlers/auth.php" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required="required" autofocus="autofocus" autocomplete="off">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" onclick="showPass()">
                Show Password
              </label>
            </div>
          </div>
          <input type="submit" name="btnLogin" value="Login" class="btn btn-primary btn-block">
        </form>
        
        <div class="text-center">
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Assembly Core JavaScript -->
  <script src="js/assembly.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/swal2/dist/sweetalert2.min.js"></script>

  <!-- Alert Gagal Login -->
  <?php if (isset($_SESSION['msg_failed'])){ ?>
  <script>

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        });

        Toast.fire({
        icon: 'error',
        title: '<?php echo $_SESSION['msg_failed']; ?>'
        });

  </script>
  <?php 
    } 
      $_SESSION['msg_failed'] = NULL; // Untuk Membuat Alert Gagal Login Hanya Muncul Sekali
  ?>

</body>

</html>
