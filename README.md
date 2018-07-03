# unesco

UNESCO Associate Project officer Job Test


<h3>Requirements:</h3>
<ul>
	<li>PHP 5.5 and above</li>
	<li>Apache / Tomcat</li>
	<li>Bootstap 4.1 (incuded)</li>
	
</ul>

<h3>Installation:</h3>
Download the whole Module. Unzip it and name the folder as <strong>unescotest</strong>. save this folder in the Server folder (e.g. /www/html/).After that run the system on your browser like: 
<p>http://localhost/unescotest/login.php</p>

<h3>User Manual</h3>
<h4>Login Page</h4>
<ul>
	<li>The site will open the Login Page. Please provide the username as <strong>john</strong> and password as <strong>john</strong></li>
 <li>If the login is correct, it will forward the user to the <strong>Observation Manager Page</strong>. Else Shows the login incorrect Message.</li>
  <ul>

<h4>Observation Manager</h4>
<ul>
  <li>It contains all the inserted data of the Observation Form</li>
  <li>To add New Observation Click on the <strong> Add New Observation </strong> link</li>
   <li>To Edit old Observation record Click on the <strong> Edit </strong> link infornt of that row</li>
   <li>To Delete old Observation record Click on the <strong> Delete </strong> link infornt of that row a conformation Message will appear if you click yes button it will delete that record</li>
</ul>

    	
<h3>Task Management Documentation</h3>
1: Analysis and Task Management of the whole Task. 
<br />Completed in 20 mins. 
<br />Did the Analysis of the whole task and divide my task into three phase which includes Designing of the form, PHP Prgramming (Server Side), and Browser Compatibilitiy Check 	

2: Developed of the Login form using BootStrap & HTML.
<br />Completed in 15 mins. 
<br />
<p>

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

</p>
  


3: Make a connection with the Database of the server using a php code file name connect.php.   
<br />Completed in 15 mins.
<br />
<p>
$connection = mysqli_connect('185.14.184.54', 'interview', 'LtTZztdTjvV22n2J');
if (!$connection){
    die("Database Connection Failed " . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'interview');
if (!$select_db){
    die("Database Selection Failed " . mysqli_error($connection));
}
</p>

4: 



7:Your work should be compatible with the current latest versions of Chrome and Firefox.	
<br />Completed in 5 mins	

<ul>	
	<li>Presented By: Syed Sana ul Haq Fazli<br />
	http://www.syedfazli.com</li>

</ul>

