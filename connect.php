<?php
$connection = mysqli_connect('185.14.184.54', 'interview', 'LtTZztdTjvV22n2J');
if (!$connection){
    die("Database Connection Failed " . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'interview');
if (!$select_db){
    die("Database Selection Failed " . mysqli_error($connection));
}
?>