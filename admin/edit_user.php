<?php

if (isset($_GET["user_id"])){

    $user_id_edit = $_GET["user_id"];
    $query = "SELECT * FROM users WHERE user_id = $user_id_edit";
    $query_process = mysqli_query($connection,$query);

    $user = mysqli_fetch_assoc($query_process);
    $username = $user["username"];
    $user_password = $user["user_password"];
    $user_firstname = $user["user_firstname"];
    $user_lastname = $user["user_lastname"];
    $user_email = $user["user_email"];
    $user_role = $user["user_role"];
    //$user_image = $user["user_image"];
    
}

if (isset($_POST["edit_user"])){
    
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $user_email = $_POST["user_email"];
    $username = $_POST["username"];
    $user_password = $_POST["user_password"];

    $query_salt = "SELECT user_salt from users";
    $query_salt_process = mysqli_query($connection, $query_salt);
    $result = mysqli_fetch_assoc($query_salt_process);
    $randsalt = $result["user_salt"];
    $password = crypt($user_password, $randsalt);
    
    // if (empty($image)){
    //     $image = $post_image;
    // }
    // else{
    //     move_uploaded_file($temp_image, "../images/$image");
    // } 

    $query_update = "UPDATE users SET username='$username', user_password='$password', user_firstname='$user_firstname', user_lastname='$user_lastname', user_email='$user_email', user_role='$user_role' WHERE user_id=$user_id_edit"; 
    $query_update_process = mysqli_query($connection, $query_update);

    if(!$query_update_process){
        die("query failed" . mysqli_error($connection));
    }
    else{
        echo "<p class='alert alert-success'>The user information is successfully updated.</p>";
    }
}

?>

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
            <input class="form-control" type="text" name="username" value=<?php echo $username; ?>>
        </div>
        <!-- <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="image">
        </div> -->
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="password" name="user_password" value=<?php echo $user_password; ?>>
        </div>
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </form>
</div>