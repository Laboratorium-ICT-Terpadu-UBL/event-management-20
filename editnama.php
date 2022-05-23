<?php

    include 'koneksi.php';
    
        $username = filter_input(INPUT_POST,"username");
        $namabr = filter_input(INPUT_POST,"nmbr");
        $sql = "update users set nama='$namabr' where nama='$username'";

        $tersimpan = mysqli_query($koneksi,$sql);

        if($tersimpan){
            echo "success";
        }else{
            echo "failure";
        }

?>