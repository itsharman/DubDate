<?php

// http://forum.codecall.net/topic/40286-tutorial-storing-images-in-mysql-with-php/
// Create MySQL login values and
// set them to your login information.

$username = dwp7;
$password = XhzoK1l45sDy34tr;
$host = "localhost";
$database = "binary";

// Make the connect to MySQL or die
// and display an error.

$link = mysql_connect($host, $username, $password);
if (!$link) 
{
die('Could not connect: ' . mysql_error());
}

// Select your database
mysql_select_db ($database);

?>

//my idea -- get some type of api that allows user to upload image from computer to server (CS50 IDE)
// --> make a table in mysql where a user id corresponds to the url of the image uploaded
// --> when trying to display image, just load it from form (using SQL cmnds to make sure image corresponds to user)