<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Davechimp</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <!-- Le styles -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/smoothness/jquery-ui.custom.min.css " rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
    </head>
    
    <body>
             
        
        <div class="container">
        	<div class="row-fluid">
        		<div class="span8 offset2 well">
		        	<div class="row-fluid">
		        		<h1>Davechimp</h1>
		        	</div>
		        	
		        	<div class="row-fluid">
		        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		        	</div>
		        	
		        	<div class="row-fluid">
			        	<form action="" method="POST" id='mailchimp-form'>
				        	<div class="input-append">
				        		<input id='email' name="email" type="email" placeholder="Enter your email">
				        		<button class="btn">Submit</button>
				        	</div>
			        	</form>
			        	<div id="error"></div>
		
		        	</div>
        		</div>
        	</div>
        </div>     
             
             
        <footer>     
        
        
		    <!--javascript files used throughout the document-->
	        <script src="assets/js/jquery.js" type="text/javascript"></script>
	        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	        <script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
	        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
	        <script src="assets/js/hide-address-bar.js" type="text/javascript"></script>
	        <script src="assets/js/placeholder-fix.js" type="text/javascript"></script>
	        
	        <script>
			$("#mailchimp-form").validate({
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
			        $("#mailchimp-form").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
			        $("#rror").empty();
			        
			        var email = $("#email").val();
			        
			        var data = {
				        email:email
			        };
			        $.ajax({
			             type: "POST",
			             url: "mailchimp.php",
			             data: data,
			             success: function (res) {
			                  $("#mailchimp-form div").remove(".spinner");//remove loading icon here

			                  if (res == true) {
			                     //success action
			                     $("#email").val("");  
			                     $("#error").html("Thanks for signing up!");   
			                  } else {
			                  	$("#error").html(res);
			                      
			                  }
			        
			             }
			        });
			        
			
			    }
			});
	        
	        </script>
        
        </footer>
    </body>

</html>