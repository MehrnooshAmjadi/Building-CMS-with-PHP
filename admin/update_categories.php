<?php

$cat_id_edit = $_GET["edit"];
$query_edit = "SELECT * FROM categories WHERE cat_id = $cat_id_edit ";
$query_edit_process = mysqli_query($connection, $query_edit);

if (isset($_POST["submit_edit"])){
    // echo $_POST["category_edit"];
     $new_cat_edit = $_POST["category_edit"];
     $query_update = "UPDATE categories SET cat_title = '$new_cat_edit' WHERE cat_id = $cat_id_edit ";
     $query_update_process = mysqli_query($connection, $query_update);                         
  } 


while ($result = mysqli_fetch_assoc($query_edit_process)){
    $cat_title_edit = $result["cat_title"];

?>
<form action="categories.php?edit=<?php echo $cat_id_edit; ?>" method="post">
    <div class="form-group">
        <label for="edit category">Edit category</label>
        <input class="form-control" type="text" name="category_edit" value="<?php if(isset($new_cat_edit)){ echo $new_cat_edit;} else{echo $cat_title_edit;} ?>">
    </div>
    <input class="btn btn-primary" type="submit" name="submit_edit" value="Update Category">       
</form>

<?php } ?>
