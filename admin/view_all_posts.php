<?php

if (isset($_POST["table_submit"]) && isset($_POST["selectArray"])){

    if ($_POST["process"] != ""){
    
        // print_r($_POST["selectArray"]);
        switch($_POST["process"]){
            case "published":{
                foreach ($_POST["selectArray"] as $post_id) {
                    $query_publish = "UPDATE posts SET post_status = 'published' WHERE post_id={$post_id}";
                    $query_publish_process = mysqli_query($connection, $query_publish);
                }
                break;
            }

            case "draft":{
                foreach ($_POST["selectArray"] as $post_id) {
                    $query_draft = "UPDATE posts SET post_status = 'draft' WHERE post_id={$post_id}";
                    $query_draft_process = mysqli_query($connection, $query_draft);
                }
                break;
            }

            case "delete":{
                foreach ($_POST["selectArray"] as $post_id) {
                    $query_draft = "DELETE FROM posts WHERE post_id={$post_id}";
                    $query_draft_process = mysqli_query($connection, $query_draft);
                }
                break;

            }
        }
    }
    else{
        echo "<p class='alert alert-danger'>Warning: Please select an option.</p>";
    }
}

?>


<div class="col-lg-12">
    <form action="" method="post">
        <div class="row form-group">
            <div class="col-xs-4">
                <select class="form-control" name="process">
                    <option value="">Select option</option>
                    <option value="published">Publish</option>
                    <option value="draft">Draft</option>
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" name="table_submit" value="Apply" class="btn btn-success">
                <a href="./posts.php?source=add_post" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="form-group">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th><input id="checkbox_all" type="checkbox" name="selectArray[]" value=""></th>
                        <th>id</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Tags</th>
                        <th>Comments</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                    $query = "SELECT * FROM posts";
                    $query_process = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($query_process)){
                        $post_id = $row["post_id"];
                        $post_cat_id = $row["post_cat_id"];
                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_image = $row["post_image"];
                        $post_content = $row["post_content"];
                        $post_tags = $row["post_tags"];
                        $post_comment_count = $row["post_comment_count"];
                        $post_status = $row["post_status"];

                        $query_cat = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
                        $query_cat_process = mysqli_query($connection, $query_cat);
                        $result = mysqli_fetch_assoc($query_cat_process);
                        $cat_title = $result["cat_title"];
                                    
                    ?>
                        <tr>
                            <td><input class="checkbox_item" type="checkbox" name="selectArray[]" value="<?php echo $post_id; ?>"></td>
                            <td><?php echo $post_id; ?></td>
                            <td><?php echo $cat_title; ?></td>
                            <td><?php echo "<a href='../post.php?post={$post_id}'>{$post_title}</a>"; ?></td>
                            <td><?php echo $post_author; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td><?php echo "<img class='img-thumbnail' src='../images/$post_image' style='max-width:100px;' />"; ?></td>
                            <td><?php echo $post_tags; ?></td>
                            <td><?php echo $post_comment_count; ?></td>
                            <td><?php echo $post_status; ?></td>
                            <td><a href="posts.php?source=edit_post&post_id=<?php echo $post_id; ?>">Edit</a></td>
                            <td><a href="posts.php?delete=<?php echo $post_id; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>

                    <?php

                        //Delete Post
                        if (isset($_GET["delete"])){
                            
                            $delete_id = $_GET["delete"];
                            $query = "DELETE FROM posts WHERE post_id = $delete_id";
                            $query_process = mysqli_query($connection, $query);
                            header("Location:posts.php");
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>