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

                            case "add_user":
                                include "add_user.php";
                                break;
                            case "edit_user":
                                include "edit_user.php";
                                break;
                            default:
                                include "view_all_users.php";
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