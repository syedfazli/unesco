<?php
//session is destroyed and forwarded it to the login page
session_start();
session_destroy();
header('Location: login.php');
?>