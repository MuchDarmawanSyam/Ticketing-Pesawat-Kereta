  <!-- Alert Penambahan Data Petugas -->
  <?php 
    if (isset($_SESSION['status_operasi'])){
      
      if ($_SESSION['status_operasi'] == TRUE){
  ?>

        <script>
          Swal.fire({
             icon: 'success',
             title: 'Success',
             text: '<?= $_SESSION['msg']; ?>',
          });
        </script>

  <?php
      }elseif ($_SESSION['status_operasi'] == FALSE){
  ?>

        <script>
          Swal.fire({
             icon: 'error',
             title: 'OOps...',
             text: '<?= $_SESSION['msg']; ?>',
          });
        </script>

  <?php
      }
    }
       // Membuat Alert Muncul Sekali
       $_SESSION['status_operasi'] = NULL;
  ?>