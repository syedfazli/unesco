<?php

session_start();
//including the database connection file
require('connect.php');

if(isset($_POST['update'])){
    $id = (int) $_GET['id'];
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
            echo "<font color='red'>You are not Logged-In Please <a href='login.php'>Click Here</a> to Login.</font><br/>";
        } 
    } 
    else {    
        // if all the fields are filled (not empty)             
        //Update data to database
        $result = mysqli_query($connection, 
        "UPDATE observations SET 
        scientificname='$scientificname',
        longitude = '$longitude',
        latitude = '$latitude',
        date = str_to_date('$date','%d-%m-%Y'),
        user_id = '$user_id' 
        WHERE id = '$id'");   
        
        //if updated, display success message
        if($result){
            
            echo "<font color='green'>Data Updated successfully.";
            echo "<br/><a href='observation_manager.php'>View Result</a>";
        }
        //if not updated, display unsuccessfull message
        else
        {
            $fmsg = "<font color='red'>Data Not Updated Successfully. Error: " . mysqli_error($connection) . "</font><br />";
            echo $fmsg;
        }
    }
}
?>
<?php
//getting id from url
$id = (int) $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM observations WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $id = (int) $res['id'];
    $scientificname = $res['scientificname'];
    $longitude = (float) $res['longitude'];
    $latitude = (float) $res['latitude'];
    $date = date("d-m-Y", strtotime($res['date']));
    $user_id = (int) $res['user_id'];
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Observation Update Form</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

            <h3>Update Form</h3>
<form method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Scientific Name</td>
                <td><input type="text" name="scientificname" value="<?php echo $scientificname;?>"></td>
            </tr>
            <tr> 
                <td>Logitude</td>
                <td><input type="text" name="longitude" value="<?php echo $longitude;?>"></td>
            </tr>
            <tr> 
                <td>Latitude</td>
                <td><input type="text" name="latitude" value="<?php echo $latitude;?>"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="text" name="date" value="<?php echo $date;?>"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>