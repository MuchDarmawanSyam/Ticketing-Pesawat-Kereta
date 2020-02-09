<?php
    // Load App
    require_once("../app.php");

    if (isset($_POST['btnUpdate'])){

        // Dapatkan Data yang diInput
        $fullname = $_POST['newName'];
        $username = $_POST['newUsr'];
        $password = $_POST['newPass'];
        $cpass = $_POST['cpass'];

        // Data Tambahan
        $idOfficer = $_POST['idOfficer'];
        $usr = $_POST['usr'];

        // Dapatkan Data Login
        $pass = $data->get('petugas', ['username' => $_SESSION['login_user']]);

        if ($cpass !== $pass['password']){

            // Jika confirm password salah
            $_SESSION['status_operasi'] = FALSE;
            $_SESSION['ket_operasi'] = 'ConfirmPasswordSalah1';
            $_SESSION['msg'] = 'Confirm Password Tidak Valid.';
            header("location: ../entries-formEditOfficer.php?Officer=$idOfficer&usr=$usr");

        }else{

            // Jika Melakukan Update Gambar Profil
            if ($_FILES['NewimgProfile']['name'] !== '' ){
               
                // Dapatkan Data Gambar yang Diinput
                $pic_name = $_FILES['NewimgProfile']['name'];
                $pic_size = $_FILES['NewimgProfile']['size'];
                $pic_data = $_FILES['NewimgProfile']['tmp_name'];

                // Olah Format
                $split = explode('.', $pic_name);
                $extention = strtolower(end($split));

                // Olah Nama Pic
                $level = $data->get('petugas', ['id_petugas' => $idOfficer]);
                $nama_level = $level['id_level'] == 2 ? 'PROFIL-PETUGAS' : 'PROFIL-ADMIN';
                $angka_unik = rand(1,999);
                $nama_pic_new = $nama_level.'_'.$level['nama_petugas'].$angka_unik.'.'.$extention;

                // Config Upload Pic
                $pic_extention_allowed = ['png', 'jpg', 'jpeg'];
                $pic_size_allowed = 1044070;
                $pic_destination = 'img/profil-admin/'.$nama_pic_new;

                // Jika Ukuran Gambar Diupdate Memenuhi Syarat Format
                if (in_array($extention, $pic_extention_allowed) === TRUE){

                    // Jika Ukuran Gambar Diupdate Memenuhi Syarat Ukuran
                    if ($pic_size < $pic_size_allowed){

                        // Pindahkan Gambar
                        $move_pic = move_uploaded_file($pic_data, $pic_destination);

                        if ($move_pic){

                            echo "Berhasil Upload Gambar";

                        }else{

                            echo "Gagal Upload Gambar";

                        }

                    // Jika Tidak Memenuhi Syarat Ukuran
                    }else{

                        echo "Ukuran Gambar Terlalu Besar";

                    }

                // Jika Tidak Memenuhi Syarat Format
                }else{

                    echo "Hanya Diperbolehkan Gambar";

                }

            // Jika Tidak Melakukan Update Gambar Profil
            }else{

                echo "Kagak";
            }

        }

        

    }else{

        $_SESSION['status_operasi'] = FALSE;
        $_SESSION['ket_operasi'] = 'IllegalAccess';
        $_SESSION['msg'] = 'Gagal Memuat Halaman. Halaman diakses Secara Illegal.';

        header("location: ../entries-manageOfficers.php");
    }
?>