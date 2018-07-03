<?php
//including the database connection file
include("connect.php");
 
//getting id of the data from url
$id = (int) $_GET['id'];
 
//deleting the row from table
$result = mysqli_query($connection, "DELETE FROM observations WHERE id=$id");
 
if($result){
    echo "<font color='green'>Data Updated successfully.";
    header("Location: observation_manager.php");
}
else
{
    $fmsg = "<font color='red'>Data Not Deleted Successfully. Error: " . mysqli_error($connection) . "</font><br />";
    echo $fmsg;
}

?>