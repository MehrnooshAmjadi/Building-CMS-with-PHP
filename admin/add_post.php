<?php

if (isset($_POST["submit"])){
    
    $title = $_POST["title"];
    $cat_id = $_POST["cat_title"];
    $author = $_POST["author"];
    $status = $_POST["status"];
    $tags = $_POST["tags"];
    $content = $_POST["content"];
    $date = date("m-d-y");
    $image = $_FILES["image"]["name"];
    $temp_image = $_FILES["image"]["tmp_name"];

    move_uploaded_file($temp_image, "../images/$image");
    $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) 
              VALUES ('$cat_id', '$title', '$author', now(), '$image', '$content', '$tags', '$status')";

    $query_process = mysqli_query($connection, $query);
    $new_post_id = mysqli_insert_id($connection);
    if(!$query_process){
        die("query failed! " . mysqli_error($connection));
    }
    else{
        echo "<div class='alert alert-success'> Post is successfully added. <a href='../post.php?post={$new_post_id}'>View post</a> or <a href='./posts.php'>Edit more posts</a></div>";
    }
}

?>

<div class="col-lg-6">
    <form action="" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title">
        </div>
        <div class="form-group">
            <label for="Category ID">Category ID</label>
            <select class="form-control" name="cat_title">
                <?php
                $query_cat = "SELECT * FROM categories";
                $query_cat_process= mysqli_query($connection, $query_cat);

                while ($result = mysqli_fetch_assoc($query_cat_process)){
                    $cat_title = $result["cat_title"];
                    $cat_id_dr = $result["cat_id"];
                    echo "<option value='$cat_id_dr'>$cat_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Author">Author</label>
            <input class="form-control" type="text" name="author">
        </div>
        <div class="form-group">
            <label for="Status">Status</label>
            <select name="status" class="form-control">
                <option value='draft'>draft</option>
                <option value='published'>published</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="image">
        </div>
        <div class="form-group">
            <label for="Tags">Tags</label>
            <input class="form-control" type="text" name="tags">
        </div>
        <div class="form-group">
            <label for="summernote">Content</label>
            <textarea id="summernote" class="form-control" name="content" ></textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Add Post">
    </form>
</div>