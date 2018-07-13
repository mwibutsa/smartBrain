<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 29/06/2018
 * Time: 14:46
 */
function get_path(){

    $path = array();
    if (isset($_SERVER['REQUEST_URI'])){
        $request_path = explode('?',$_SERVER['REQUEST_URI']);
        $path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']),'\/');
        $path['all_utf8'] = substr(urldecode($request_path[0]),strlen($path['base'])+1);
        $path['call'] = utf8_decode($path['call_utf8']);
        if($path['call'] == basename($_SERVER['PHP_SELF'])){
            $path['call'] = '';
        }
        $path['call_parts'] = explode('/',$path['call']);
        $path['query_utf8'] = urldecode($request_path[1]);
        $path['query']  = utf8_decode(urldecode($request_path[1]));
        $vars = explode('&',$path['query']);
        foreach($vars as $var){
            $t = explode('=',$var);
            $path['query_vars'][$t[0]] = $t[1];
        }
    }
    return $path;
}
function get_categories(){
    global $dbConnection;
    $categoryCommand = "SELECT * FROM category ORDER  BY number_of_posts DESC";
    $categories = $dbConnection->query($categoryCommand);
    if ($categories->num_rows > 0){
        return $categories;
    }
}
// getting all posts function
function get_posts(){
    global $dbConnection;
    $postCommand = "SELECT * FROM post ORDER BY post_date DESC";
    $posts = $dbConnection->query($postCommand);
    if($posts->num_rows > 0){
        return $posts;
    }
    else{
        die("No posts are currently available");
    }
}

//get user function using an id
function get_user($id){
  global $dbConnection;
  $userCommand = "SELECT * FROM staff WHERE id = $id";
  $users = $dbConnection->query($userCommand);
  if ($users->num_rows > 0){
      $user = $users->fetch_assoc();
      $user['fullname'] = $user['firstname'] ." ".$user['lastname'];
      return $user;
  }
}
// getting single post function

function get_post($id){

    global $dbConnection;
    $postCommand = "SELECT * FROM post WHERE id = $id ORDER BY post_date DESC";
    $posts = $dbConnection->query($postCommand);
    if($posts->num_rows > 0){
        return $posts;
    }
    else{
        die("No posts are currently available");
    }
}
function getValue($var){
    global  $dbConnection;
    $var = $_REQUEST[$var];
    $var = strip_tags($var);
    $var = stripcslashes($var);
    $var = htmlentities($var);
    $var = htmlspecialchars($var);
    $var = $dbConnection->real_escape_string($var);
    return $var;

}
function get_comments($postId){
    global $dbConnection;
    $showCommentsQuery = "SELECT * FROM comment WHERE post_id =  $postId ORDER BY comment_date DESC";
    $comments = $dbConnection->query($showCommentsQuery);
    if ($comments->num_rows > 0){

        return $comments;
    }
    else{
        $comment="No Comments Are Available";
        return $comment;
    }

}
function get_number_of_comments($id){
    global $dbConnection;
    $postCommand = "SELECT number_of_comments FROM post WHERE id = $id";
    $posts = $dbConnection->query($postCommand);
    if($posts->num_rows > 0){
        $post = $posts->fetch_assoc();
        return $post;
    }
    else{
        die("No posts are currently available");
    }
}