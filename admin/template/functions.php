<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 29/06/2018
 * Time: 22:37
 */
function file_upload(){
    if ($_FILES){
        $pathToImages="../images/";
        $pathToVideos ="../videos/";
        $filename = $_FILES['file']['name'];
        $extension = pathinfo($filename,PATHINFO_EXTENSION);
        switch (strtolower($extension)){
            case "jpg":
            case "jpeg":
            case "jpg":
            case "jpeg":
            case "gif":
            case "png":
            case "tiff":
            case "svg":
                $pathToImages .= $filename;
                move_uploaded_file($_FILES['file']['tmp_name'],$pathToImages);
                $stringTodatabase = "<img src='".substr($pathToImages,3)."' class='post-image'>";
            return $stringTodatabase;
            case "mp4":
            case "mkv":
            case "mpeg":
            case "flv":
            case "mpg":
            case "vob":
            case "webem":
                $pathToVideos .= $filename;
                move_uploaded_file($_FILES['file']['tmp_name'],$pathToVideos);
                $stringTodatabase = "<video class='post-video' width='720' height='400' controls><source src='".substr($pathToVideos,3)."' "."type='".$_FILES['file']['type']."'></video>";
                return $stringTodatabase;
            default:
                return "";
        }
    }
    return "";
}
function getValue($var){
    global $dbConnnection;
    $var = $_REQUEST[$var];
    $var = stripcslashes($var);
    $var = strip_tags($var);
    $var = $dbConnnection->real_escape_string($var);
    return $var;
}
function show_editable($pid,$dbConnection){
    global $title,$file,$postText,$user,$categoryId;
    $sqlCommand ="SELECT * FROM post WHERE id = $pid";
    $currentPost = $dbConnection->query($sqlCommand);
    if ($currentPost->num_rows > 0){
        while($post = $currentPost->fetch_assoc()){
            $title = $post['title'];
            $postText = $post['post_text'];
            $file = $post['post_file'];
            $categoryId = $post['category'];
            $user = $post['posted_by'];

        }
    }
}
function delete_post($pid,$dbConnection){
    global $message;
    $sqlCommand = "DELETE FROM post WHERE id = $pid";
    $deleteResult = $dbConnection->query($sqlCommand);
    if ($deleteResult){
        $message = "Post Deleted Successfully";
    }
    else{
        $message = $sqlCommand;
        $message .= mysqli_error($dbConnection);
    }
}
function validate_inputs($v = array()){
    foreach ($v as $value){
        if ($value == "" || $value == null){
            return false;
        }

    }
    return true;
}