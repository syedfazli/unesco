<?php

session_start();
//including the database connection file
include_once("connect.php");
 
//fetching data in descending order (lastest entry first)
$result = mysqli_query($connection, "SELECT * FROM observations ORDER BY id DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Observation Manager</title>
</head>
 
<body>
    <?php
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "Hi " . $username . " ";
        echo "This is the Members Area ";
        echo "<a href='logout.php'>Logout</a><br /><br />";
    
       
    ?>
    <a href="observation_add.php">Add New Observation</a><br/><br/>
 
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Scientific Name</td>
            <td>Logitude</td>
            <td>Latitude</td>
            <td>Date</td>
            <td>Update</td>
        </tr>
        <?php 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['scientificname']."</td>";
            echo "<td>".$res['longitude']."</td>";
            echo "<td>".$res['latitude']."</td>";
            echo "<td>".$res['date']."</td>";    
            echo "<td><a href=\"observation_edit.php?id=$res[id]\">Edit</a> | <a href=\"observation_del.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>
    <?php } 
    else{
        header("Location: login.php");
    }
    ?>
</body>
</html>