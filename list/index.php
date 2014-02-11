

<?php 

// Define your username and password 
$username = "emily"; 
$password = "emilypass"; 

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 

?> 

<h1>Login</h1> 

<form name="form" method="post" action="
"> 
    <p><label for="txtUsername">Username:</label> 
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p> 

    <p><label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p> 

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 

<?php 

} 
else { 
	include("../config.php");
	include("../dbconnect.php");
	
	
	$data = mysql_query("SELECT email FROM emails ORDER BY date_entered")or die(mysql_error());
	echo "<h2>Email List</h2>";
	echo "<ul>";
	while($info = mysql_fetch_array($data)){
		$email = $info["email"];
		echo "<li>".$email."</li>";
	}
	echo "</ul>";

} 

?> 