<?php include "db.php"; ?>


<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Login -->
<div class="well">
    <h4>Login to the CMS</h4>
    <form action="include/login.php" method="post">
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">
                    Login
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php   
                $query = "SELECT * FROM categories";
                $query_process = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($query_process)){
                    $cat_name = $row["cat_title"];
                    $cat_id = $row["cat_id"];
                    echo "<li><a href='./index.php?category=$cat_id'>{$cat_name}</a></li>";
                }
            ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>
