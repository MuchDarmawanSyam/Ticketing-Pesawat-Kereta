    <!-- Log Out -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    </div>



    <!-- Profile Function -->
    <?php
      // Dapatkan Data User
      $user_profile = $data->get('petugas', ['username' => $_SESSION['login_user']]);
    ?>

    <!-- Profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Profile Account</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
                <img src="img/profil-admin/<?= $user_profile['img_profil_petugas'] ?>" alt="" class="col-lg-3 col-md-5 col-sm-5" id="img-profile">
                <div class="col-sm-7">
                  <b>
                    Name : <?= $user_profile['nama_petugas']; ?>
                    <br>
                    Username : <?= $user_profile['username']; ?>
                    <br>
                    Password : <?= $user_profile['password']; ?>
                    <br>
                    Akses Level : <?= $user_profile['id_level'] == '1' ? 'Administraror' : 'Petugas'; ?>
                  </b>
                </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-secondary" href="#editProfile">Edit</a>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    </div>



    <!-- Form Add Officer -->
    <div class="modal fade" id="formAddOfficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Assembly_handlers/addOfficer.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Add Officer</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group col-xl-6">
                   <label for="FnameOfficer">First Name :</label>
                  <input type="text" name="FnameOfficer" placeholder="Nama Depan" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-group col-xl-6">
                  <label for="LnameOfficer">Last Name :</label>
                  <input type="text" name="LnameOfficer" placeholder="Nama Belakang" class="form-control" required="required" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                   <label for="username">Username :</label>
                  <input type="text" name="username" placeholder="Nama Pengguna" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-group col-xl-6">
                  <label for="password">Password :</label>
                   <input type="password" name="password" placeholder="Password Pengguna" class="form-control" required="required">
                 </div>
               </div>
                 <div class="form-group">
                   <label for="levelAccess">Level Access :</label>
                   <select name="levelAccess" class="form-control">
                          <option value="2">PETUGAS</option>
                    </select>
               </div>
             </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-success" name="btnAddOfficer" value="Add">
          </div>
        </form>
      </div>
    </div>
    </div>




        <!-- Form Edit Officer -->
        <div class="modal fade" id="formEditOfficer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="Assembly_handlers/addOfficer.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Officer</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group col-xl-6">
                   <label for="FnameOfficer">First Name :</label>
                  <input type="text" name="FnameOfficer" placeholder="Nama Depan" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-group col-xl-6">
                  <label for="LnameOfficer">Last Name :</label>
                  <input type="text" name="LnameOfficer" placeholder="Nama Belakang" class="form-control" required="required" autocomplete="off">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xl-6">
                   <label for="username">Username :</label>
                  <input type="text" name="username" placeholder="Nama Pengguna" class="form-control" required="required" autocomplete="off">
                </div>
                <div class="form-group col-xl-6">
                  <label for="password">Password :</label>
                   <input type="password" name="password" placeholder="Password Pengguna" class="form-control" required="required">
                 </div>
               </div>
                 <div class="form-group">
                   <label for="levelAccess">Level Access :</label>
                   <select name="levelAccess" class="form-control">
                          <option value="2">PETUGAS</option>
                    </select>
               </div>
             </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-success" name="btnAddOfficer" value="Add">
          </div>
        </form>
      </div>
    </div>
    </div>