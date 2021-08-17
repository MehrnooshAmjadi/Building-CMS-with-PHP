<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        $query = "SELECT * FROM users";
        $query_process = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_process)){
            $user_id = $row["user_id"];
            $username = $row["username"];
            $user_firstname = $row["user_firstname"];
            $user_lastname = $row["user_lastname"];
            $user_email = $row["user_email"];
            $user_image = $row["user_image"];
            $user_role = $row["user_role"];
                        
        ?>
            <tr>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $user_firstname; ?></td>
                <td><?php echo $user_lastname; ?></td>
                <td><?php echo $user_email; ?></td>
                <td><?php echo "<img class='img-thumbnail' src='../images/$user_image' style='max-width:100px;' />"; ?></td>
                <td><?php echo $user_role; ?></td>
                <td><a href="users.php?becomeAdmin=<?php echo $user_id; ?>">Admin</a></td>
                <td><a href="users.php?becomeSubscriber=<?php echo $user_id; ?>">Subscriber</a></td>
                <td><a href="users.php?source=edit_user&user_id=<?php echo $user_id; ?>">Edit</a></td>
                <td><a href="users.php?delete=<?php echo $user_id; ?>">Delete</a></td>
            </tr>
        <?php } ?>

        <?php

            //Delete Post
            if (isset($_GET["delete"])){
                
                $delete_id = $_GET["delete"];
                $query = "DELETE FROM users WHERE user_id = $delete_id";
                $query_process = mysqli_query($connection, $query);
                header("Location:users.php");
            }

            //Become Admin
            if (isset($_GET["becomeAdmin"])){
                
                $become_admin_id = $_GET["becomeAdmin"];
                $query_admin = "UPDATE users Set user_role='admin' WHERE user_id=$become_admin_id";
                $query_admin_process = mysqli_query($connection, $query_admin);
                header("Location:users.php");
            }

            //Become Subscriber
            if (isset($_GET["becomeSubscriber"])){
                
                $become_subscriber_id = $_GET["becomeSubscriber"];
                $query_subscriber = "UPDATE users Set user_role='subscriber' WHERE user_id=$become_subscriber_id";
                $query_subscriber_process = mysqli_query($connection, $query_subscriber);
                header("Location:users.php");
            }
        ?>
    </tbody>
</table>