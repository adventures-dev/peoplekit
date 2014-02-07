<?php

	$email = $_POST['email'];
	
    include("config.php");
    include("dbconnect.php");
    
    $email = mysql_real_escape_string($email);
    $date_entered = date("Y-m-d H:i:s");
    
    mysql_query("INSERT INTO emails (email, date_entered) VALUES ('$email', '$date_entered')")or die(mysql_error());
    
    echo true;
    /*
	include('MCAPI.class.php');

	$apikey = $chimpapikey;
	$listId = $chimplistId;
	$api    = new MCAPI($apikey);

	$merge_vars = array(
	   'FNAME' => $firstName,
 	   'LNAME' => $lastName
    );

	// By default this sends a confirmation email - you will not see new members
	// until the link contained in it is clicked!
	$retval = $api->listSubscribe($listId, $email, $merge_vars);

	if ($api->errorCode) {
		echo $api->errorMessage;
	} else {
		echo true;
	}
	
	*/


?>