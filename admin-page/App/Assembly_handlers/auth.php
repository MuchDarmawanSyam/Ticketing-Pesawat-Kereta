<?php 
    // Muat File app
    require_once("../app.php");

        // == LOGIN START == //
    if (isset($_POST['btnLogin'])){

        // Dapatkan Data Inputan
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Jalankan Fungsi Login
        if ($username !== "" & $password !== ""){

            $parameter = ['username' => $username, 'password' => $password];
            $result = $auth->login('petugas', $parameter);
            $level = $data->get('petugas', ['username' => $username]);

            if ($result == TRUE){

                $_SESSION['login_user'] = $username;
                $_SESSION['msg_failed'] = FALSE;
                $_SESSION['login_status'] = TRUE;
                    
                if ($level['id_level'] == '1'){
                    
                    $_SESSION['msg_login'] = 'Selamat Datang '.$username.', Anda Login Sebagai Administrator';
                    $_SESSION['lvl_login'] = 'Admin';
                    $_SESSION['administartor'] = TRUE;
                    $auth->redirect("../index");
                }elseif ($level['id_level'] == '2'){

                    $_SESSION['msg_login'] = 'Selamat Datang '.$username.', Anda Login Sebagai Petugas';
                    $_SESSION['lvl_login'] = 'Pegawai';
                    $_SESSION['administartor'] = FALSE;
                    $auth->redirect("../index");
                }else{

                    $_SESSION['msg_failed'] = 'Akun Anda Tidak / Belum Terdaftar dengan BENAR! Jika Anda Adalah Petugas / Otoritas Aplikasi ini Silahkan Hubungi Admin';
                    $_SESSION['login_status'] = FALSE;
                    $auth->redirect("../login");
                }

            }else{

                $_SESSION['msg_failed'] = 'Username / Password Salah!';
                $_SESSION['login_status'] = FALSE;
                $auth->redirect("../login");
            }

        }else{

            $_SESSION['msg_failed'] = 'Username / Password Tidak Boleh Kosong!';
            $_SESSION['login_status'] = FALSE;
            $auth->redirect("../login");
        }
    }else{

        $_SESSION['status_operasi'] = FALSE;
        $_SESSION['ket_operasi'] = 'IllegalAccess';
        $_SESSION['msg'] = 'Gagal Memuat Halaman. Halaman diakses Secara Illegal';
        $auth->redirect("../check-session");

    }
        // +++ END of LOGIN +++ //

?>