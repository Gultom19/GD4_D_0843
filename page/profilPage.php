<?php 
    include '../component/sidebar.php' 
?> 

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #D40013; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" > 
    <div class="body d-flex justify-content-between"> 
        <h4>PROFILE USER</h4>
    </div> 
    <hr>

    <?php   
    include ('../db.php'); 
    $id = $_SESSION['user']['id'];

    $query = mysqli_query($con, "SELECT * FROM user WHERE id = '$id'") or die(mysqli_error($con));
    $user = mysqli_fetch_assoc($query);

        echo'
            <table class="table ">
            <tr>
                <th>Name</th>
            </tr>
            <tr>
                <td>'.$user['name'].'</td> 
            </tr>

            <tr>
                <th>Email</th>
            </tr>
            <tr>
                <td>'.$user['email'].'</td> 
            </tr>

            <tr>
                <th>Membership</th>
            </tr>
            <tr>
                <td>'.$user['membership'].'</td> 
            </tr>

            <tr>
                <th>Phone Number</th>
            </tr>
            <tr>
            <td>'.$user['phonenum'].'</td> 
            </tr>
    
        </table>

            <div class="d-grid gap-2"> 
                <a class="btn btn-primary" href="../page/editPage.php" role="button">Edit Profile</a>
            </div>';
    ?>
    </div> 
</aside>

        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous">
        </script> 
    </body> 
</html>