<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 01/07/2018
 * Time: 13:20
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

                </div>
            </div><!-- END ADMIN SIDEBAR NAVIGATION -->
            <div class="col-md-9"><!-- MAIN pAGE BODY STARTS HERE -->
                <ul id="sideNav">
                    <li><a href="settings.php?id=4&setting=1"<?php if (isset($_GET['setting']) && $_GET['setting'] == 1)
                            echo " class='active'";?>><span class="glyphicon glyphicon-camera"></span> Logo</a></li>
                    <li><a href="settings.php?id=4&setting=2"<?php if (isset($_GET['setting']) && $_GET['setting'] == 2)
                            echo " class='active'";?>><span class="glyphicon glyphicon-list"></span> Navigation</a></li>
                    <li><a href="settings.php?id=4&setting=3"<?php if (isset($_GET['setting']) && $_GET['setting'] == 3)
                            echo " class='active'";?>><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
                </ul>


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

