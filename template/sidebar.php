<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 03/07/2018
 * Time: 18:42
 */

$categories = get_categories();
$posts = get_posts();

?>
<div class="panel panel-info">
    <div class="panel-heading"><h2>Search Post</h2></div>
    <div class="panel-body">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>" class="form-inline">
            <div class="form-group">
                <input type="search" class="form-control" name="searchString" placeholder="Search ...">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> </button>

            </div>
        </form>
    </div>
</div>
<div class="panel panel-warning">
    <div class="panel-heading">Categories</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <?php
            while($category = $categories->fetch_assoc()){
                ?>
                <li><a href="&category=<?php echo $category['id'] ;?>"><?php echo $category['name'] ;?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="panel-footer">

    </div>
</div>
<div class="panel panel-success">
    <div class="panel-heading">Most Recent Posts</div>
    <div class="panel-body">
        <ul class="nav nav-pills">
            <?php
            while($post = $posts->fetch_assoc()){
                ?>
                <li><a href="?category=<?php echo $post['id'] ;?>"><?php echo $post['title'] ;?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>

