<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 03/07/2018
 * Time: 19:58
 */
include "config/database.php";
include("template/functions.php");
session_start();
if (isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];

}
else{
    $userId = 1;
}
if (isset($_REQUEST['comment']) && !empty($_REQUEST['comment'])){
    $comment = getValue('comment');
    $postId =  getValue('postId');
    $userId = getValue('userId');
    $commentStatement = $dbConnection->prepare("INSERT INTO comment (user_id ,post_id ,comment ,comment_date) VALUES (?,?,?,NOW())");
    $commentStatement->bind_param('iis',$userId,$postId,$comment);
    $commentStatement->execute();
    //updating number of comments

    $updateQuery = "UPDATE post SET number_of_comments = number_of_comments + 1 WHERE id=$postId";
    $updateResult = $dbConnection->query($updateQuery);
    if ($updateResult){

    }else{
        die("Failled To Update Number Of Comments".mysqli_error($dbConnection));
    }
}
?>
<!DOCTYE html>
<html>
<head>
    <title>Flocodes Blog</title>
    <?php include "template/css.php"; ?>
    <?php include "template/js.php"; ?>
    <script src="comment.js" type="text/javascript"></script>
    <style>
        .post-file{
            padding-left: 10%;
        }

    </style>
    <script>
        $video = document.getElementsByName("video");
        for (video as vid){
            vid.setAttribute("autoplay","autoplay");
        }

    </script>
</head>
<body>
<div class="container-fluid" id="wrapper"> <!-- wrapper div starts here -->
    <?php include "template/navigation.php" ; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <?php

                $posts = get_post((int)$_GET['post']);

                while ($post = $posts->fetch_assoc()){
                    $post['number_of_comments'] = "<span class='badge'>".(int)$post['number_of_comments']."</span>";
                    echo "<div classs='post'>";
                    ?>

                    <div class="well">
                        <h3 class="post-title list-group-item-heading"><?php echo $post['title'];?></h3>
                        <div class="post-file"><?php echo $post['post_file'];?></div>
                        <div class="post-text"><?php echo $post['post_text'];?></div>
                        <span class="glyphicon glyphicon-arrow-right"> Posted On: <?php echo $post['post_date'];?></span><br>
                        <span class="glyphicon glyphicon-user"> By: <?php echo get_user((int)$post['posted_by'])['fullname'];?></span>
                    </div>
                    <?php echo "</div>"; }  ?>
                <div class="comment">
                    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" placeholder="Comment on this post" rows="4"></textarea>
                            <input type="hidden" value="<?php echo $_GET['post'];?>" name="postId" id="postId">
                            <input type="hidden" value="<?php echo $userId;?>" name="userId" id="userId">
                        </div>
                        <input type="submit" value="Comment" class="btn btn-primary" onclick="return submitComment()">
                   </form>

                </div>
                <div class="allComments" id="allComments"><h4><span class="badge"><?php echo get_number_of_comments($_GET['post'])['number_of_comments'];?></span> Comments</h4>
                    <?php
                    $comments = get_comments($_GET['post']);
                    if (!is_string($comments))
                        while($comment = $comments->fetch_assoc()){

                            ?>
                            <div class="comment-container">
                                <span class="glyphicon glyphicon-user"></span><span style="color: darkolivegreen;"> <?php echo get_user((int)$comment['user_id'])['fullname'];?></span><br><br>
                                <div class="comment"><?php echo  $comment['comment'];?><span class="date" style="color: brown; font-weight: bold"><br><?php echo $comment['comment_date'];?></span></div>

                            </div>


                            <?php
                        }
                        else{
                            echo "<span class='glyphicon glyphicon-alert'> Be The First one to comment on this post</span><br><br>";
                        }
                    ?>
                </div>
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

