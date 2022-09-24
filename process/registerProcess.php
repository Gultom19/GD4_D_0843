<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['register'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $nama = $_POST['nama'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phonenum = $_POST['phonenum'];
    $email = $_POST['email'];
    $membership = $_POST['membership'];
    // Melakukan insert ke databse dengan query dibawah ini
    $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email' OR phonenum = '$phonenum'") or
        die(mysqli_error($con));
        if(mysqli_num_rows($query) == 0){
            $query = mysqli_query(
                $con,
                "INSERT INTO user(email, password, name, phonenum, membership)
                VALUES
                ('$email', '$password', '$name', '$phonenum', '$membership')"
            )
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan
            // ditangani oleh perintah “or die”
            if ($query) {
                echo
                '<script>
                    alert("Register Berhasil");
                    window.location = "../index.php"
                    </script>';
            } else {
                echo
                '<script>
                    alert("Register Gagal");
                    </script>';
            }
        }else{
            $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
            if(mysqli_num_rows($query) == 1){
                echo
                '<script>
                alert("Register Gagal email harus unik!"); window.location = "../page/registerPage.php"
                </script>';
            }else{
                echo
                '<script>
                alert("Register Gagal Phonenumber harus unik!"); window.location = "../page/registerPage.php"
                </script>';
            }
            
        } 
}else{
    echo
    '<script>
    window.history.back()
    </script>';
}