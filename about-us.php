<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 04/07/2018
 * Time: 14:23
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
?>
<!DOCTYE html>
<html>
<head>
    <title>Flocodes Blog</title>
    <?php include "template/css.php"; ?>
    <?php include "template/js.php"; ?>

</head>
<body>
<div class="container-fluid" id="wrapper"> <!-- wrapper div starts here -->
    <?php include "template/navigation.php" ; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="jumbotron">
                    <h1>About Flocodes WebSite</h1>
                    PHP tutorial for beginners and professionals provides deep knowledge of PHP scripting language. Our PHP tutorial will help you to learn PHP scripting language easily.

                    This PHP tutorial covers all the topics of PHP such as introduction, control statements, functions, array, string, file handling, form handling, regular expression, date and time, object-oriented programming in PHP, math, PHP mysql, PHP with ajax, PHP with jquery and PHP with XML.
                    What is PHP

                    PHP stands for HyperText Preprocessor.
                    PHP is an interpreted language, i.e. there is no need for compilation.
                    PHP is a server side scripting language.
                    PHP is faster than other scripting language e.g. asp and jsp.

                    <h1>Our Mission And Goals</h1>
                    PHP tutorial for beginners and professionals provides deep knowledge of PHP scripting language. Our PHP tutorial will help you to learn PHP scripting language easily.

                    This PHP tutorial covers all the topics of PHP such as introduction, control statements, functions, array, string, file handling, form handling, regular expression, date and time, object-oriented programming in PHP, math, PHP mysql, PHP with ajax, PHP with jquery and PHP with XML.
                    What is PHP

                    PHP stands for HyperText Preprocessor.
                    PHP is an interpreted language, i.e. there is no need for compilation.
                    PHP is a server side scripting language.
                    PHP is faster than other scripting language e.g. asp and jsp.

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


