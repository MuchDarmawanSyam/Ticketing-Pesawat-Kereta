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

            // Jika Salah Satu / Semua Form Ada yang Kosong
            $_SESSION['status_operasi'] = FALSE;
            $_SESSION['ket_operasi'] = 'ConfirmPasswordSalah1';
            $_SESSION['msg'] = 'Confirm Password Tidak Valid';
            header("location: ../entries-formEditOfficer.php?Officer=$idOfficer&usr=$usr");

        }else{

            
        }

        

    }else{

        $_SESSION['status_operasi'] = FALSE;
        $_SESSION['ket_operasi'] = 'IllegalAccess';
        $_SESSION['msg'] = 'Gagal Memuat Halaman. Halaman diakses Secara Illegal';

        header("location: ../entries-manageOfficers.php");
    }
?>