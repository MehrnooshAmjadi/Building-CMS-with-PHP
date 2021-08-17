<?php include "db.php" ?>
<?php session_start() ?>

<?php

if (isset($_POST['login'])){

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        // echo $username . "<br/>";
        // echo $password . "<br/>";

    
       $username = mysqli_real_escape_string($connection, $username);
       $password = mysqli_real_escape_string($connection, $password);
    
        $query = "SELECT * FROM users WHERE username = '$username' AND user_password = '$password'";
        $query_process = mysqli_query($connection, $query);

        if(!$query_process){
            die("query failed! " . mysqli_error($connection));
        }
        $result = mysqli_fetch_assoc($query_process);
        
        if(empty($result)){
            header("Location:../index.php");
        }
        else{
            $_SESSION["username"] = $result["username"];
            $_SESSION["password"] = $result["user_password"];
            $_SESSION["email"] = $result["user_email"];
            $_SESSION["firstname"] = $result["user_firstname"];
            $_SESSION["lastname"] = $result["user_lastname"];
            $_SESSION["role"] = $result["user_role"];
            header("Location:../admin/index.php");
        }
    }
    else{
        header("Location:../index.php");
    }

}

?>