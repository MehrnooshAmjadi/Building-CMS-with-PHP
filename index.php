<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>

    <!-- Navigation -->
    <?php include "include/nav.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

        <?php

            if(isset($_GET["category"])){
                $cat_id_get = $_GET["category"];
                $query = "SELECT * FROM posts WHERE post_cat_id = $cat_id_get AND post_status='published' ORDER BY post_date DESC";
            }
            else{
                $query = "SELECT * FROM posts WHERE post_status='published' ORDER BY post_date DESC";
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
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?post=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "{$post_author}"; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?post=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
                <hr>
                <p><?php echo substr("$post_content",0, 30) . "..."; ?></p>
                <a class='btn btn-primary' href='post.php?post=<?php echo $post_id; ?>'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
                <hr>

            <?php  } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php"; ?>

        </div>
        <!-- /.row -->

<?php include "include/footer.php"; ?>