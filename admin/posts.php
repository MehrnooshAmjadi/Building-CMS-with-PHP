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
                    <div class="col-lg-12">
                        <?php
                        
                        if (isset($_GET["source"])){
                            $source = $_GET["source"];
                        }
                        else{
                            $source = "";
                        }

                        switch($source){

                            case "add_post":
                                include "add_post.php";
                                break;
                            case "edit_post":
                                include "edit_post.php";
                                break;
                            default:
                                include "view_all_posts.php";
                                break;
                        }

                        ?>
                        
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"; ?>