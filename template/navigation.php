<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 03/07/2018
 * Time: 18:35
 */
?>

<nav class="navbar navbar-inverse">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Flocodes Blog</a>
    </div>
    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="nav navbar-nav">
            <li<?php if (!isset($_GET['page']) && !isset($_GET['blog'])) echo " class='active'";?>><a href="http://localhost/mwibutsa/smartBrain/index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li<?php if (isset($_GET['page'])) echo " class='active'";?>><a href="http://localhost/mwibutsa/smartBrain/about-us.php?page=about-us"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
            <li<?php if (isset($_GET['blog'])) echo " class='active'";?>><a href="blog.php?blog=1"><span class="glyphicon glyphicon-education"></span> Blog</a></li>
        </ul>

    </div> <!-- Navbar toggle div ends here-->

</nav> <!-- MAIN navigation ends here -->
