<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/admin_nav.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <!-- <small>Author</small> -->
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                        <?php Insert_Category(); ?>
                        <form action="categories.php" method="post">
                            <div class="form-group">
                                <label for="add category">Add category</label>
                                <input class="form-control" type="text" name="category">
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">       
                        </form>
                        <br/>

                        <?php 

                        if (isset($_GET["edit"])){
                            include "update_categories.php";
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Category title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php Delete_category(); Display_Category(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"; ?>