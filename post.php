<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

    <!-- Navigation -->
    <?php include "include/nav.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

            <?php

                if(isset($_GET["post"])){
                    $post_id_get = $_GET["post"];
                    $query = "SELECT * FROM posts WHERE post_id = $post_id_get";
                }
                else{
                   // $query = "SELECT * FROM posts";
                }

                $query_process = mysqli_query($connection, $query);
                if (mysqli_num_rows($query_process)==0) { 
                    echo "<h2>No post is available!</h2>"; 
                }

                while ($row = mysqli_fetch_assoc($query_process)){

                    $post_id = $row["post_id"];
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_image = $row["post_image"];
                    $post_content = $row["post_content"];
                ?>

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <?php } ?>
                <hr>

                <!-- Blog Comments -->

                <?php

                    if (isset($_POST["comment_submit"])){
     
                        $comment_post_id = $_GET["post"];
                        $comment_author = $_POST["comment_author"];
                        $comment_email = $_POST["comment_email"];
                        $comment_content = $_POST["comment_content"];

                        if( !empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                            
                            $query_comment = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_date, comment_status, comment_content) 
                            VALUES ('$comment_post_id', '$comment_author', '$comment_email', now(), 'Unapprove', '$comment_content')";

                            $query_comment_process = mysqli_query($connection, $query_comment);

                            if (!$query_comment_process){
                                die("Query Failed! " . mysqli_error($connection));
                            }

                            $query_comment_count = "UPDATE posts SET post_comment_count = post_comment_count+1 WHERE post_id=$comment_post_id";
                            $query_comment_count_process = mysqli_query($connection, $query_comment_count);

                            if (!$query_comment_count_process){
                                die("Query Failed! " . mysqli_error($connection));
                            }
                        }
                        else{
                            echo "<p class='alert alert-danger'>Warning: Please fill out all the fields.</p>";
                        }
                    }
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Content">Your content</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <?php

                    if(isset($_GET["post"])){
                        $post_id_cm = $_GET["post"];
                        $query_show_comment = "SELECT * FROM comments WHERE comment_post_id = $post_id_cm AND comment_status='approved' ORDER BY comment_id DESC";
                        $query_show_comment_process = mysqli_query($connection, $query_show_comment);

                        While( $row = mysqli_fetch_assoc($query_show_comment_process)){

                            $comment_author = $row["comment_author"];
                            $comment_date = $row["comment_date"];
                            $comment_content = $row["comment_content"];

                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php } } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

<?php include "include/footer.php"; ?>
