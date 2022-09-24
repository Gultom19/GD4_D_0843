<?php 
    session_start(); 
    if(isset($_POST['edit'])){ 
        include ('../db.php'); 
        $name = $_POST['name']; 
        $phonenum = $_POST['phonenum']; 
        $id = $_SESSION['user']['id'];
        $membership = $_POST['membership']; 
        $email = $_POST['email']; 

        $queryUpdate = mysqli_query($con, "UPDATE `user` SET `name`='$name',`email`='$email',`phonenum`='$phonenum',`membership`='$membership' WHERE id='$id'") 
        or die(mysqli_error($con)); 
        
            if($queryUpdate){ 
                echo 
                '<script> 
                    alert("Edit Berhasil"); 
                    window.location = "../page/profilPage.php" 
                </script>'; 
            }else{ 
                echo 
                '<script> 
                    alert("Edit Gagal"); 
                    window.location = "../page/profilPage.php" 
                    </script>'; 
            } 
    }else {
         echo 
         '<script> 
         window.history.back() 
         </script>';
    }
?>