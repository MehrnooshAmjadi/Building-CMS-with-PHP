<?php

if (isset($_GET["post_id"])){

    $post_id_edit = $_GET["post_id"];
    $query = "SELECT * FROM posts WHERE post_id = $post_id_edit";
    $query_process = mysqli_query($connection,$query);

    $post = mysqli_fetch_assoc($query_process);
    $post_title = $post["post_title"];
    $post_cat_id = $post["post_cat_id"];
    $post_author = $post["post_author"];
    $post_status = $post["post_status"];
    $post_tags = $post["post_tags"];
    $post_content = $post["post_content"];
    $post_image = $post["post_image"];
    
}

if (isset($_POST["submit_edit"])){
    
    $title = $_POST["title"];
    $cat_title = $_POST["cat_title"];
    $author = $_POST["author"];
    $status = $_POST["status"];
    $tags = $_POST["tags"];
    $content = $_POST["content"];
    $date = date("m-d-y");
    $image = $_FILES["image"]["name"];
    $temp_image = $_FILES["image"]["tmp_name"];
    
    if (empty($image)){
        $image = $post_image;
    }
    else{
        move_uploaded_file($temp_image, "../images/$image");
    } 

    $query_update = "UPDATE posts SET post_cat_id='$cat_title', post_title='$title', post_author='$author', post_date=now(), post_image='$image', post_content='$content', post_tags='$tags', post_status='$status' WHERE post_id=$post_id_edit"; 
    $query_update_process = mysqli_query($connection, $query_update);

    if(!$query_update_process){
        die("query failed" . mysqli_error($connection));
    }

    echo "<div class='alert alert-success'> Post is successfully updated. <a href='../post.php?post={$post_id_edit}'>View post</a> or <a href='./posts.php'>Edit more posts</a></div>";
}

?>

<div class="col-lg-6">
    <form action="" method="post" enctype= multipart/form-data>
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo $post_title; ?>">
        </div>
        <div class="form-group">
            <label for="Select a category">Select a category</label>
            <br/>
            <select class="form-control" name="cat_title" id="">
                <?php 
                $query_cat = "SELECT * FROM categories";
                $query_cat_process = mysqli_query($connection, $query_cat);

                while ($row = mysqli_fetch_assoc($query_cat_process)){
                    $cat_id = $row["cat_id"];
                    $cat_title = $row["cat_title"];
                ?>
                    echo "<option value='<?php echo $cat_id; ?>' <?php if ($post_cat_id == $cat_id){echo "selected";} ?>><?php echo $cat_title; ?></option>";
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Author">Author</label>
            <input class="form-control" type="text" name="author" value="<?php echo $post_author; ?>">
        </div>
        <div class="form-group">
            <label for="Status">Status</label>
            <select name="status" class="form-control">
                <option value='draft' <?php if (($post_status) == 'draft') {echo "selected";} ?> >draft</option>
                <option value='published' <?php if (($post_status) == 'published') {echo "selected";} ?>>published</option>
            </select>
            <!-- <input class="form-control" type="text" name="status" value="<?php echo $post_status; ?>"> -->
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <input type="file" name="image">
            <img class='img-thumbnail' src="../images/<?php echo $post_image; ?>" style='max-width:100px;' />
        </div>
        <div class="form-group">
            <label for="Tags">Tags</label>
            <input class="form-control" type="text" name="tags" value="<?php echo $post_tags; ?>">
        </div>
        <div class="form-group">
            <label for="summernote">Content</label>
            <textarea id="summernote" class="form-control" name="content" ><?php echo $post_content; ?></textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="submit_edit" value="Edit Post">
    </form>
</div>