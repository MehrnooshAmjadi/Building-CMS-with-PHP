<?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>


    <!-- Navigation -->
    
    <?php  include "include/nav.php"; ?>
    
    <?php

    $empty_field_error = False;
    $user_regitration = False;

    if (isset($_POST["submit"])){

        $username = $_POST["username"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if( !empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) ){
            $username = mysqli_escape_string($connection, $username);
            $firstname = mysqli_escape_string($connection, $firstname);
            $lastname = mysqli_escape_string($connection, $lastname);
            $email = mysqli_escape_string($connection, $email);
            $password = mysqli_escape_string($connection, $password);

            $query_salt = "SELECT user_salt from users";
            $query_salt_process = mysqli_query($connection, $query_salt);
            $result = mysqli_fetch_assoc($query_salt_process);
            $randsalt = $result["user_salt"];
            $password = crypt($password, $randsalt);

            $query_user = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) 
                           Value ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}' , 'subscriber')";
            $query_user_process = mysqli_query($connection, $query_user);

            if(!$query_user_process){
                die("Query Faild! " . mysqli_error($connection));
            }
            else{
                $user_regitration = True;
            }
        }
        else{
            $empty_field_error = True;
        }
    }
    ?>
    
    <!-- Page Content -->
    <div class="container">
        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="form-wrap">
                            <h1>Register</h1>
                            <?php
                                if($empty_field_error){
                                    echo "<p class='alert alert-danger'>Warning: None of the fields could be empty.</p>";
                                }
                                if($user_regitration){
                                    echo "<p class='alert alert-success'>You are successfully registered.</p>";
                                }
                            ?>
                            <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                <div class="form-group">
                                    <label for="Username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                </div>
                                <div class="form-group">
                                    <label for="Firstname" class="sr-only">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your Firstname">
                                </div>
                                <div class="form-group">
                                    <label for="Lastname" class="sr-only">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your Lastname">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                </div>
                                <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                            </form>    
                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>
        <hr>

<?php include "include/footer.php";?>
