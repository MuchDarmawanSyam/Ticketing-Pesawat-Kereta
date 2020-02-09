<?php
    // Muat File App
    require_once("../app.php");

    // Memulai Validasi Data
    if (isset($_POST['btnAddOfficer'])){

        $nama_petugas = $_POST['FnameOfficer']." ".$_POST['LnameOfficer'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $lvl = $_POST['levelAccess'];
        $username_used = $data->get('petugas', ['username' => $username]);
        $password_used = $data->get('petugas', ['password' => $password]);
        $jml_username = strlen($username);
        $jml_password = strlen($password);

        // Validasi Form
        switch ($nama_petugas && $username && $password) {
            case '':
                
                // Jika Salah Satu / Semua Form Ada yang Kosong
                $_SESSION['status_operasi'] = FALSE;
                $_SESSION['ket_operasi'] = 'DataKosong';
                $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Form Tidak Boleh Ada Yang Kosong.';

                header("location: ../entries-manageOfficers.php");

                break;
            
            default:
                
                if ($jml_username >= 8){

                    if ($jml_password >= 8){
                
                        if ($lvl == 2){

                            if ($username !== $username_used['username']){

                                if ($password !== $password_used['password']){

                                    $result = $crud->create('petugas', ['', $username, $password, $nama_petugas, $lvl, 'PROFILE-DEFAULT.jpg']);

                                    if ($result){

                                        $_SESSION['status_operasi'] = TRUE;
                                        $_SESSION['ket_operasi'] = NULL;
                                        $_SESSION['msg'] = 'Data Petugas Baru Telah Ditambahkan.';
                        
                                        header("location: ../entries-manageOfficers.php");
                        

                                    }else{

                                        $_SESSION['status_operasi'] = FALSE;
                                        $_SESSION['ket_operasi'] = 'GagalQuery';
                                        $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Kesalahan dalam Menambahkan Data.';
                        
                                        header("location: ../entries-manageOfficers.php");

                                    }

                                }else{

                                    $_SESSION['status_operasi'] = FALSE;
                                    $_SESSION['ket_operasi'] = 'ProhibitedValue';
                                    $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Password Sudah Digunakan.';
                    
                                    header("location: ../entries-manageOfficers.php");

                                }
                                

                            }else{

                                $_SESSION['status_operasi'] = FALSE;
                                $_SESSION['ket_operasi'] = 'ProhibitedValue';
                                $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Username Sudah Digunakan.';
                
                                header("location: ../entries-manageOfficers.php");

                            }

                        }else{

                                $_SESSION['status_operasi'] = FALSE;
                                $_SESSION['ket_operasi'] = 'ProhibitedValue';
                                $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Administrator Tidak Bisa Ditambahkan.';
                
                                header("location: ../entries-manageOfficers.php");

                        }

                    }else{

                        $_SESSION['status_operasi'] = FALSE;
                        $_SESSION['ket_operasi'] = 'ProhibitedValue';
                        $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Password Harus Setidaknya Sepanjang 8 Karakter.';
        
                        header("location: ../entries-manageOfficers.php");

                    }
                
                }else{

                    $_SESSION['status_operasi'] = FALSE;
                    $_SESSION['ket_operasi'] = 'ProhibitedValue';
                    $_SESSION['msg'] = 'Gagal Menambahkan Data Petugas. Username Harus Setidaknya Sepanjang 8 Karakter.';
    
                    header("location: ../entries-manageOfficers.php");

                }

                break;
        }

    }else{

        $_SESSION['status_operasi'] = FALSE;
        $_SESSION['ket_operasi'] = 'IllegalAccess';
        $_SESSION['msg'] = 'Gagal Memuat Halaman. Halaman diakses Secara Illegal.';

        header("location: ../entries-manageOfficers.php");

    }


?>