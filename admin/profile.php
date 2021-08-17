<?php include "include/admin_header.php"; ?>
<?php

if (isset($_SESSION["username"])){

    $username_get = $_SESSION["username"];
    $query = "SELECT * FROM users WHERE username = '{$username_get}'";
    $query_process = mysqli_query($connection,$query);

    $user = mysqli_fetch_assoc($query_process);
    $username_data = $user["username"];
    $user_password = $user["user_password"];
    $user_firstname = $user["user_firstname"];
    $user_lastname = $user["user_lastname"];
    $user_email = $user["user_email"];
    $user_role = $user["user_role"];
    $user_image = $user["user_image"];
    
}

if (isset($_POST["edit_profile"])){
    
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $user_email = $_POST["user_email"];
    $username = $_POST["username"];
    $user_password = $_POST["user_password"];
    
    // if (empty($image)){
    //     $image = $post_image;
    // }
    // else{
    //     move_uploaded_file($temp_image, "../images/$image");
    // } 

    $query_update = "UPDATE users SET username='$username', user_password='$user_password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_email='$user_email', user_role='$user_role' WHERE username='{$username_data}'"; 
    $query_update_process = mysqli_query($connection, $query_update);

    if(!$query_update_process){
        die("query failed" . mysqli_error($connection));
    }
}

?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small><?php echo $_SESSION["firstname"]; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <form action="" method="post" enctype= multipart/form-data>
                                <div class="form-group">
                                    <label for="First Name">First Name</label>
                                    <input class="form-control" type="text" name="user_firstname" value=<?php echo $user_firstname; ?>>
                                </div>

                                <div class="form-group">
                                    <label for="Last Name">Last Name</label>
                                    <input class="form-control" type="text" name="user_lastname" value=<?php echo $user_lastname; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="Role">Role</label>
                                    <select class="form-control" name="user_role">
                                        <option value="admin" <?php if ($user_role == 'admin') {echo 'selected';} ?> >Admin</option>
                                        <option value="subscriber" <?php if ($user_role == 'subscriber') {echo 'selected';} ?>>Subscriber</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input class="form-control" type="email" name="user_email" value=<?php echo $user_email; ?>>
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input class="form-control" type="text" name="username" value=<?php echo $username_data; ?>>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="Image">Image</label>
                                    <input type="file" name="image">
                                </div> -->
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input class="form-control" type="password" name="user_password" value=<?php echo $user_password; ?>>
                                </div>
                                <input class="btn btn-primary" type="submit" name="edit_profile" value="Edit Profile">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"; ?>