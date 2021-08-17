<?php include "include/db.php"; ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php
                
                $query = "SELECT * FROM categories";
                $query_process = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($query_process)){
                    $cat_name = $row["cat_title"];
                    $cat_id = $row["cat_id"];
                    echo "<li><a href='./index.php?category=$cat_id'>{$cat_name}</a></li>";
                }
                ?>

                  <li><a href="./admin/index.php">Admin</a></li>
                  <?php

                  if (isset($_SESSION["username"])){
                      if (isset($_GET["post"])){
                          echo "<li><a href='./admin/posts.php?source=edit_post&post_id={$_GET["post"]}'>Edit Post</a></li>";
                      }
                  }

                  ?>
<!--  
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>