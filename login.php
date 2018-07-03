<?php
session_start();
require('connect.php');

if(isset($_POST) & !empty($_POST)){
    $username = $_POST['username'];
    //$password = password_hash($_POST['$password'], PASSWORD_DEFAULT);
    $password = $_POST['password'];
         
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
        
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    
    if ($count == 1){
        
        while($res = mysqli_fetch_array($result)) {  
            $_SESSION['user_id'] =$res['id'];
            $_SESSION['username'] = $res['username'];
        }
        header("Location: observation_manager.php");
    }else{
        $fmsg = "Invalid Login Credentials.";
        echo $fmsg;
    }
}



?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login Form</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">
	        <span class="input-group-addon" id="basic-addon1">@</span>
	        <input type="text" name="username" class="form-control" placeholder="Username" required>
	    </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        
      </form>
    
</body>
</html>