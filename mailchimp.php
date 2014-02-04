<?php

	$email = $_POST['email'];
	$email = mysql_real_escape_string($email);
	
    include("config.php");
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


?>