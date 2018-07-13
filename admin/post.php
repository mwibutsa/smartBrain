<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 29/06/2018
 * Time: 21:46
 */
include "config/database.php";
include "template/functions.php";
$title=$categoryId=$user=$postText=$file="";
if (isset($_GET['pid'])){
    show_editable($_GET['pid'],$dbConnnection);
}
if (isset($_REQUEST['title'])){
    $postTitle = getValue('title');
}

if (isset($_REQUEST['category'])){
    $category = getValue('category');
}
if (isset($_REQUEST['user'])){
    $user = getValue('user');
}
if (isset($_REQUEST['postText'])){
    $postText = $_POST['postText'];
}
if ($_FILES){
    $file = file_upload();
}


if (isset($postTitle,$category,$user,$postText,$file)){
    if (!isset($_POST['edit']))
    if (validate_inputs([$postTitle,$postText])) {
        $sqlCommand = $dbConnnection->prepare("INSERT INTO post(title ,post_text ,post_file ,post_date ,posted_by ,number_of_comments ,category) VALUES(?,?,?,NOW(),?,0,?)");
        $sqlCommand->bind_param('sssii', $postTitle, $postText, $file, $user, $category);
        $sqlCommand->execute();
    }
    else {
        $message = "Make Sure That Title,Or Post Text Have  value";
    }


}
else{
    if(isset($postTitle,$category,$user,$postText,$file)){
        if (isset($_GET['pid'])){
            $pid = $_GET['pid'];
        }
        else{
            $pid = 0;
        }
        $sqlCommand = "UPDATE post SET title='$postTitle',post_text='$postText' ";
        if ($file !=""){
            $sqlCommand.= ",post_file='".$dbConnnection->real_escape_string($file)."'";
        }
        $sqlCommand.=",posted_by=$user,category = $category WHERE id =$pid";
        $updateResul = $dbConnnection->query($sqlCommand);
        if ($updateResul){
            $message = "Updated Success Fully";
        }else{
            $message =htmlspecialchars($sqlCommand);
            $message .="<br><br>". mysqli_error($dbConnnection);
        }
    }

}
if (isset($_POST['deletePost'])){
    delete_post($_POST['deletePost'],$dbConnnection);

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flocodes Blog</title>
    <?php include "template/css.php";?>
    <?php include "template/js.php";?>

</head>
<body>
<div class="container-fluid" id="wrapper"> <!-- wrapper div starts here -->

    <?php include "template/navigation.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="overflow-y: auto;"><!--SIDEBAR NAVIGATION -->
                <?php
                $sqlCommand = "SELECT * FROM post ORDER BY post_date DESC ";
                $posts = $dbConnnection->query($sqlCommand);
                if($posts->num_rows > 0){
                ?>
                <div class="list-group">

                    <a class="list-group-item btn btn-link" href="?post=new"> <span class="btn btn-warning"> <span class="glyphicon glyphicon-plus"> New Post</span></span></a>

                    <?php
                    while($post =  $posts->fetch_assoc()){
                        ?>
                        <?php
                        echo "<a href='post.php?id=3&pid=$post[id]' class='list-group-item'><span class='glyphicon glyphicon-arrow-right'></span><h4 class=\"list-group-item-heading\">$post[title]</h4>";
                        echo "<p class='list-group-item-text'>".strip_tags(substr($post['post_text'],0,100))."</p>";
                        ?>
                        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                            <input type="hidden" value="<?php echo $post['id'];?>" name="deletePost">
                            <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span> Delete Post</button>
                        </form>
                    <?php


                        echo "</a>";

                    }
                    }

                    ?>
                </div>
            </div><!-- END ADMIN SIDEBAR NAVIGATION -->
            <div class="col-md-9">
                   <?php if (isset($message)):
                        echo "<div class='alert alert-info fade in'>$message
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a></div>";
                   endif;
                   ?>
                <form action="post.php" method="post" enctype="multipart/form-data">

                    <div class="form-group"><!-- Title--><?php ?>
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Page Title" value="<?=$title;?>">
                    </div>

                        <label for="title">Post File</label> <!-- Post FIle--><?php ?>
                        <input type="file" class="form-control" name="file" placeholder="Page Label" value="<?=$file;?>">

                    <div class="form-group"><label for="category">Category</label> <!-- Category--><?php ?>
                        <select name="category" id="category" class="form-control">
                            <?php
                            if (isset($_GET['new'])){
                                echo "<option value=\"0\" class=\"form-control\" selected>Select Category</option>";
                            }
                            ?>
                            <?php
                                $categorySql = "SELECT * FROM category";
                                $categories = $dbConnnection->query($categorySql);
                                if ($categories->num_rows > 0){
                                    while ($category = $categories->fetch_assoc()){

                                        echo "<option value='$category[id]'";
                                        if ($category['id'] == $categoryId){
                                            echo " selected";
                                        }

                                        echo ">$category[name]</option>";
                                    }
                                }
                            ?>
                        </select>
                        <label for="user">User</label><!-- user--><?php ?>
                        <select name="user" id="user" class="form-control">
                            <option value="0" class="form-control">Select Staff</option>
                            <?php
                            $sqlCommand = "SELECT * FROM staff";
                            $members = $dbConnnection->query($sqlCommand);

                            if ($members->num_rows > 0){
                                while ($staff = $members->fetch_assoc()){
                                   $staff['fullname'] = $staff['firstname']." ".$staff['lastname'];
                                    echo "<option value='$staff[id]'";
                                    if ($staff['id'] == $user){
                                        echo " selected";
                                    }
                                    echo ">$staff[fullname]</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="title">Post Text</label><!-- post Text--><?php ?>
                        <textarea name="postText" id="body" rows="10" class="form-control"><?=$postText;?></textarea>
                    </div>
                    <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-add"></span>Save</button>
                    <?php if (isset($_GET['pid']))
                        echo "<input type='hidden' name='edit' value='1'>";
                    ?>
                </form>

            </div> <!-- END CONTENT COLUMN-->
        </div><!-- END ROW 1-->


        <div class="row"><!-- START ROW 2-->
            <div class="col-md-12 col-lg-12">
                <footer class="footer" id="footer">
                    &copy;Mwibutsa Floribert 2018
                </footer><!-- FOOTER ENDS HERE-->
            </div>
        </div><!-- end ROW 2-->
    </div>

</div><!-- wrapper div ends here -->
</body>
</html>

