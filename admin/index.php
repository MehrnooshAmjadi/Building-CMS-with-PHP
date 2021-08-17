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
                            <small><?php echo $_SESSION["firstname"]; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <?php

                $query_post = "SELECT * FROM posts";
                $query_post_process = mysqli_query($connection, $query_post);
                $query_post_count = mysqli_num_rows($query_post_process);

                $query_post_draft = "SELECT * FROM posts WHERE post_status='draft'";
                $query_post_draft_process = mysqli_query($connection, $query_post_draft);
                $query_post_draft_count = mysqli_num_rows($query_post_draft_process);

                $query_comment = "SELECT * FROM comments";
                $query_comment_process = mysqli_query($connection, $query_comment);
                $query_comment_count = mysqli_num_rows($query_comment_process);

                $query_comment_approve = "SELECT * FROM comments WHERE comment_status='approved'";
                $query_comment_approve_process = mysqli_query($connection, $query_comment_approve);
                $query_comment_approve_count = mysqli_num_rows($query_comment_approve_process);

                $query_user = "SELECT * FROM users";
                $query_user_process = mysqli_query($connection, $query_user);
                $query_user_count = mysqli_num_rows($query_user_process);

                $query_user_subscriber = "SELECT * FROM users WHERE user_role = 'subscriber'";
                $query_user_subscriber_process = mysqli_query($connection, $query_user_subscriber);
                $query_user_subscriber_count = mysqli_num_rows($query_user_subscriber_process);

                $query_category = "SELECT * FROM categories";
                $query_category_process = mysqli_query($connection, $query_category);
                $query_category_count = mysqli_num_rows($query_category_process);

                ?>
                <!-- /.row -->     
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $query_post_count; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $query_comment_count; ?></div>
                                    <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?php echo $query_user_count; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $query_category_count; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                        ['Section', 'Count'],
                        <?php

                            $chart_data = ['Posts', 'Draft Posts', 'Comments', 'Approved Comments', 'Users', 'Subscriber Users', 'Categories'];
                            $chart_value = [$query_post_count, $query_post_draft_count, $query_comment_count, $query_comment_approve_count, $query_user_count, $query_user_subscriber_count, $query_category_count];

                            for($i=0; $i<sizeof($chart_data); $i++){
                                echo "['{$chart_data[$i]}' , {$chart_value[$i]}],";
                            }

                        ?>

                        ]);

                        var options = {
                        chart: {
                            title: '',
                            subtitle: '',
                        }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <br/>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "include/admin_footer.php"; ?>