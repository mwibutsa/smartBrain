<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 30/06/2018
 * Time: 11:30
 */
?>
<nav class="navbar navbar-inverse">

    <div class="navbar-header"><a class="navbar-brand" href="#">Flocodes Blog</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

    </div>
    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="nav navbar-nav">
            <li<?php if (isset($_GET['id']) && $_GET['id'] == 1){echo " class='active'";}?>><a href="index.php?id=1"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li<?php if (isset($_GET['id']) && $_GET['id'] == 2 ){echo " class='active'";}?>><a href="pages.php?id=2"><span class="glyphicon glyphicon-th-list"></span> Pages</a></li>
            <li<?php if (isset($_GET['id']) && $_GET['id'] == 3){echo " class='active'";}?>><a href="post.php?id=3"><span class="glyphicon glyphicon-comment"></span> Post</a></li>
            <li<?php if (isset($_GET['id']) && $_GET['id'] == 4){echo " class='active'";}?>><a href="settings.php?id=4"><span class="glyphicon glyphicon-dashboard"></span> Settings</a></li>

        </ul>


    </div> <!-- Navbar toggle div ends here-->

</nav> <!-- MAIN navigation ends here -->
