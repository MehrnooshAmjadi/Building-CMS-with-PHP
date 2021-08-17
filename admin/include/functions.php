<?php

// Insert categories
function Insert_Category(){

    global $connection;
    if (isset($_POST["submit"])){
        $new_cat = $_POST["category"];
        
        $query = "INSERT INTO categories (cat_title)
                  ValUES ('$new_cat')";
        $query_process = mysqli_query($connection, $query);
        
    }
}
?>

<?php

// Display categories
function Display_Category(){

    global $connection;
    $query = "SELECT * FROM categories";
    $query_process = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_process))
    {
        $cat_id = $row["cat_id"];
        $cat_title = $row["cat_title"];

?>
    <tr>
        <td><?php echo $cat_id; ?></td>
        <td><?php echo $cat_title; ?></td>
        <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
        <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
    </tr>

<?php } } ?>


<?php

//Delete Category
function Delete_category() {
    
    global $connection;
    if (isset($_GET["delete"])){
        $cat_id_delete = $_GET["delete"];
        $query_delete = "DELETE FROM categories WHERE cat_id = {$cat_id_delete}";
        $query_delte_process = mysqli_query($connection, $query_delete);
        header("Location: categories.php");
    }
}
?>
