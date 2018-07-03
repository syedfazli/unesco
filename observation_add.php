<?php
session_start();
//including the database connection file
require('connect.php');

//Check if loggedin or not
if (!isset($_SESSION['username'])){
    header("Location: login.php");
}

if(isset($_POST) & !empty($_POST)){
    $scientificname = $_POST['scientificname'];
    $longitude = (float) $_POST['longitude'];
    $latitude = (float) $_POST['latitude'];
    $date = date("d-m-Y", strtotime($_POST['date']));
    $user_id = (int) $_SESSION['user_id'];
    
    if(empty($scientificname) || empty($longitude) || empty($latitude) || empty($date) || empty($user_id)) {            
        if(empty($scientificname)) {
            echo "<font color='red'>Scientific Name field is empty.</font><br/>";
        }
        
        if(empty($longitude)) {
            echo "<font color='red'>Logitude field is empty.</font><br/>";
        }
        
        if(empty($latitude)) {
            echo "<font color='red'>Latitude field is empty.</font><br/>";
        } 
        
        if(empty($date)) {
            echo "<font color='red'>Latitude field is empty.</font><br/>";
        } 

        if(empty($user_id)) {
            echo "<font color='red'>You are not Logged-In Please <a href=''>Click Here</a> to Login.</font><br/>";
        } 
    } 
    else {    
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($connection, 
        "INSERT INTO observations(scientificname,longitude,latitude,date,user_id) 
        VALUES('$scientificname','$longitude','$latitude',str_to_date('$date','%d-%m-%Y'),'$user_id')");   
        
        if($result){
            //display success message
            echo "<font color='green'>Data added successfully.";
            echo "<br/><a href='observation_manager.php'>View Result</a>";
        }
        else
        {
            //display unsuccessfull message
            $fmsg = "<font color='red'>Data Not Added Successfully. Error: " . mysqli_error($connection) . "</font><br />";
            echo $fmsg;
        }
    }
}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Observation Form</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Update</td>
<form method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Scientific Name</td>
                <td><input type="text" name="scientificname"></td>
            </tr>
            <tr> 
                <td>Logitude</td>
                <td><input type="text" name="longitude"></td>
            </tr>
            <tr> 
                <td>Latitude</td>
                <td><input type="text" name="latitude"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="text" name="date"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>