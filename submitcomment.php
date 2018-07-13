<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 04/07/2018
 * Time: 10:46
 */
include "config/database.php";
include "template/functions.php";
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
$comments = get_comments($postId);
if (!is_string($comments)){
    while($comment = $comments->fetch_assoc()){
        ?>
        <div class="comment-container">
            <span class="glyphicon glyphicon-user">By: </span><?php echo get_user((int)$comment['user_id'])['fullname'];?><br>
            <div class="alert"><?php echo  $comment['comment'];?></div><br>
            <span class="date" style="color: brown; font-weight: bold"><?php echo $comment['comment_date'];?></span>
        </div>


        <?php
    }
}

?>


