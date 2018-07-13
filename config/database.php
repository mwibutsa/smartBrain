<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 01/07/2018
 * Time: 13:23
 */
define("HOSTNAME","localhost");
define("USERNAME","Mwibutsa");
define("PASSWORD","Password@1!9(9)6^%");
define("DATABASENAME","smartbrain");

$dbConnection =  new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASENAME);
if ($dbConnection->connect_error) die("Error : Could not connect to  the database bacause : ".mysqli_connect_error($dbConnnection));