<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "residentinfo";
$connection = mysqli_connect("$server","$username","$password");
$select_db = mysqli_select_db($connection, $database);
$tbl = "game";

if(!$select_db)
{
    echo("connection terminated");
}


?>