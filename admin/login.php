<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 28/06/2018
 * Time: 15:19
 */
include "config/database.php";
?>

<!DOCTYE html>
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
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>




            </div> <!-- END CONTENT COLUMN-->
            <div class="col-md-2"></div>
        </div><!-- END ROW 1-->


        <div class="row"><!-- STRART ROW 2-->
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
