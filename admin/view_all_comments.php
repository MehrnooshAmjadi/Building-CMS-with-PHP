<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
            <th>Content</th>
            <th>In response to</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 

        $query = "SELECT * FROM comments";
        $query_process = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_process)){
            $comment_id = $row["comment_id"];
            $comment_post_id = $row["comment_post_id"];
            $comment_author = $row["comment_author"];
            $comment_email = $row["comment_email"];
            $comment_date = $row["comment_date"];
            $comment_status = $row["comment_status"];
            $comment_content = $row["comment_content"];

            // $query_cat = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
            // $query_cat_process = mysqli_query($connection, $query_cat);
            // $result = mysqli_fetch_assoc($query_cat_process);
            // $cat_title = $result["cat_title"];
                        
        ?>
            <tr>
                <td><?php echo $comment_id ?></td>
                <td><?php echo $comment_author; ?></td>
                <td><?php echo $comment_email; ?></td>
                <td><?php echo $comment_date; ?></td>
                <td><?php echo $comment_status; ?></td>
                <td><?php echo $comment_content; ?></td>
                <td>
                    <?php
                    $query_post = "SELECT * from posts WHERE post_id = $comment_post_id";
                    $query_post_process = mysqli_query($connection, $query_post);

                    $result = mysqli_fetch_assoc($query_post_process);
                    $post_title = $result['post_title'];
                    echo "<a href='../post.php?post=$comment_post_id'>$post_title</a>"; 
                    ?>
                </td>
                <td><a href="comments.php?approve=<?php echo $comment_id; ?>">Approve</a></td>
                <td><a href="comments.php?unapprove=<?php echo $comment_id; ?>">Unapprove</a></td>
                <td><a href="comments.php?delete=<?php echo $comment_id; ?>">Delete</a></td>
            </tr>
        <?php } ?>

        <?php

            //Delete Comment
            if (isset($_GET["delete"])){
                
                $delete_id = $_GET["delete"];
                $query_delete = "DELETE FROM comments WHERE comment_id = $delete_id";
                $query_delete_process = mysqli_query($connection, $query_delete);
                header("Location:comments.php");
            }

            //Approve Comment
            if (isset($_GET["approve"])){
                
                $approve_id = $_GET["approve"];
                $query_approve = "UPDATE comments SET comment_status='approved' WHERE comment_id = $approve_id";
                $query_approve_process = mysqli_query($connection, $query_approve);
                header("Location:comments.php");
            }

            //Unapprove Comment
            if (isset($_GET["unapprove"])){
                
                $Unapprove_id = $_GET["unapprove"];
                $query_Unapprove = "UPDATE comments SET comment_status='unapproved' WHERE comment_id = $Unapprove_id";
                $query_Unapprove_process = mysqli_query($connection, $query_Unapprove);
                header("Location:comments.php");
            }
        ?>
    </tbody>
</table>