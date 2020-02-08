    <!-- Alert Buatan Salah Satu Yang Harus Ada Di Halaman Lain -->
    <?php if (isset($_SESSION['message2'])) {?>
    <div id="alert" class="row">
        <div class="col s12 alert-pos">
            <div class="card red darken-2 fix-alert">
            <div class="card-content white-text inline-alert" style="text-align: center;">
                <p><b><?php echo $_SESSION['message2']; $_SESSION['message2'] = NULL; ?></b></p>
                <a class="white-text right fix-alert-close-icon" id="alert-close">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
<?php }elseif (isset($_SESSION['message'])){ ?>
    <div id="alert-success" class="row">
        <div class="col s12 alert-pos">
            <div class="card green">
            <div class="card-content white-text inline-alert" style="text-align: center;">
                <p><b><?php echo $_SESSION['message']; $_SESSION['message'] = NULL;?></b></p>
                <a class="white-text right fix-alert-close-icon" id="alert-close-success">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php 

    $_SESSION['page-from'] = $_SERVER['PHP_SELF'];

?>