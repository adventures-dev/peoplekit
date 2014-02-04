<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PEOPLEKIT</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="A time-effective and hassie free quarterly subscription service for leaders that helps to grow your team and employees.">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        
        <!-- Le styles -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
        <?php include( "config.php");?>

        <div id="wrapper">
	        	<div id="box">
				    <div class="row-fluid">
				    	
				    	<div id="header" class="section">
				    		<img src="assets/img/logo.png">
				    	</div>
				    	<div id="subheader1">
				    		A time-effective and hassle-free quarterly subscription service for leaders that helps to grow your team and employees. .
				    	</div>
				    	
				    	<div id="subheader2">
				    		7-10 Bits & Pieces. 5 Hours. Every 90 Days. $250 Per Shipment.
				    	</div>
				    	<div id="mail_form" class="section">
				 
				        	<form action="" method="POST" id='mailchimp_form'>
					        	<div class="input-append">
					        		<input id='email' name="email" type="email" placeholder="Interested? Enter your email.">
					        		<button class="btn">Submit</button>
					        	</div>
				        	</form>
				        	<div id="error"></div>
			        	
				    	</div>
				    	<div id="footer_text">
				    		First PEOPLEKIT Ships Second Quarter 2014
				    	</div>
		
	        	</div>
	        </div>
        </div>
        
	    <!-- Le scripts -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/js/placeholder-fix.js"></script>

        <!-- custom scripts -->            
        <script type="text/javascript">
			$("#mailchimp_form").validate({
				errorPlacement: function(error, element) {
					$("#error").html(error);
				},
			    rules: {
			        email:{
				        required: true,
				        email: true
			        },
			
			    },
			    submitHandler: function (form) {
			        $("#error").html('<div class="spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
			        
			        var email = $("#email").val();
			        
			        var data = {
				        email:email
			        };
			        $.ajax({
			             type: "POST",
			             url: "mailchimp.php",
			             data: data,
			             success: function (res) {
			                  $("#mailchimp_form div").remove(".spinner");//remove loading icon here

			                  if (res == true) {
			                     //success action
			                     $("#email").val("");  
			                     $("#error").html("Thanks for signing up!").hide().fadeIn().delay(2000).fadeOut();   
			                  } else {
			                  	$("#error").html(res).hide().fadeIn().delay(2000).fadeOut();
			                      
			                  }
			        
			             }
			        });
			        
			
			    }
			});        	
        
        </script><!-- end of custom scripts -->
                
    </body>
</html>