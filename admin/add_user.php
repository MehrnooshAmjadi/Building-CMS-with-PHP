<?php

if (isset($_POST["add_user"])){
    
    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $user_email = $_POST["user_email"];
    $username = $_POST["username"];
    $user_password = $_POST["password"];
    // $image = $_FILES["image"]["name"];
    // $temp_image = $_FILES["image"]["tmp_name"];

    // move_uploaded_file($temp_image, "../images/$image");
    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) 
              VALUES ('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_role')";

    $query_process = mysqli_query($connection, $query);
    if(!$query_process){
        die("query failed! " . mysqli_error($connection));
    }
}

?>

<div class="col-lg-6">
    <form action="" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label for="First Name">First Name</label>
            <input class="form-control" type="text" name="user_firstname">
        </div>

        <div class="form-group">
            <label for="Last Name">Last Name</label>
            <input class="form-control" type="text" name="user_lastname">
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select class="form-control" name="user_role">
                <option value="admin">Admin</option>
                <option value="subscriber">Subscriber</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input class="form-control" type="email" name="user_email">
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" type="text" name="username">
        </div>
        <!-- <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="image">
        </div> -->
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="password" name="password">
        </div>
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </form>
</div>