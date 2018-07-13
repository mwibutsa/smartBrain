<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 28/06/2018
 * Time: 14:28
 */
include "config/database.php";
include("template/functions.php");

?>
<!DOCTYE html>
<html>
<head>
    <title>Flocodes Blog</title>
    <?php include "template/css.php"; ?>
    <?php include "template/js.php"; ?>
    <style>
        video{
            controls:none;
        }
        .post-file{
            padding-left:;
        }
    </style>
</head>
<body>
<div class="container-fluid" id="wrapper"> <!-- wrapper div starts here -->
    <?php include "template/navigation.php" ; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <?php

                $posts = get_posts();

                while ($post = $posts->fetch_assoc()){
                    echo "<div classs='post'>";
                    ?>

                    <div class="well">
                        <h3 class="post-title list-group-item-heading"><?php echo $post['title'];?></h3>
                        <div class="post-file"><?php echo $post['post_file'];?></div>
                        <div class="post-text"><?php echo strip_tags(substr($post['post_text'],0,100));?><br><a href="single.php?post=<?php echo $post['id'];?>">Read More....</a> </div>
                        <span class="glyphicon glyphicon-arrow-right"> Posted On: <?php echo $post['post_date'];?></span><br>
                        <span class="glyphicon glyphicon-user"> By: <?php echo get_user((int)$post['posted_by'])['fullname'];?></span>
                    </div>
                    <?php echo "</div>"; }  ?>
            </div> <!-- END CONTENT COLUMN-->
            <div class="col-md-3">
                <?php
                include "template/sidebar.php";?>
            </div>
        </div><!-- END ROW 1-->


        <div class="row"><!-- STRART ROW 2-->
            <?php include "template/footer.php" ; ?>
        </div><!-- end ROW 2-->
    </div>

</div><!-- wrapper div ends here -->

</body>
</html>
