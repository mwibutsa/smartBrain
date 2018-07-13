<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 29/06/2018
 * Time: 21:48
 */
include "config/database.php";
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
            <div class="col-md-3"><!--SIDEBAR NAVIGATION -->
                <?php
                $sqlCommand = "SELECT * FROM pages ORDER BY title ASC";
                $pages = $dbConnnection->query($sqlCommand);
                if($pages->num_rows > 0){
                ?>
                <div class="list-group">

                    <a class="list-group-item"><span class="glyphicon glyphicon-plus"></span> Add New Page</a>

                    <?php
                    while($page =  $pages->fetch_assoc()){
                        ?>
                        <?php
                        echo "<a href='index.php?pageId=$page[id]' class='list-group-item'>$page[title]</a>";
                    }
                    }

                    ?>
                </div>
            </div><!-- END ADMIN SIDEBAR NAVIGATION -->
            <div class="col-md-9">

                <form action="<?php  htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                    <div class="form-group">
                        <label for="title">Titile</label>
                        <input type="text" class="form-control" name="title" placeholder="Page Title">
                    </div>
                    <div class="form-group">
                        <label for="title">Page Label</label>
                        <input type="text" class="form-control" name="title" placeholder="Page Label">
                    </div>
                    <div class="form-group"><label for="user">User</label>
                        <label for="user">User</label><!-- user--><?php ?>
                        <select name="user" id="user" class="form-control">
                            <option value="0" class="form-control">Select Staff</option>
                            <?php
                            $sqlCommand = "SELECT * FROM staff";
                            $members = $dbConnnection->query($sqlCommand);

                            if ($members->num_rows > 0){
                                while ($staff = $members->fetch_assoc()){
                                    $staff['fullname'] = $staff['firstname']." ".$staff['lastname'];
                                    echo "<option value='$staff[id]'>$staff[fullname]</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="title">Page Slug</label>
                        <input type="text" class="form-control" name="title" placeholder="Page Slug">
                    </div>
                    <div class="form-group">
                        <label for="title">page Body</label>
                        <textarea name="body" id="body" rows="10" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-warning" type="submit"><span class="glyphicon glyphicon-add"></span>Save</button>
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
