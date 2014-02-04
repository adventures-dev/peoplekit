<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PeopleKit.co</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        
        <!-- Le styles -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    </head>
    
    <body>
        <?php include( "config.php");?>
        <?php include( "scripts/dbconnect.php");?>

        
        <div id='wrap'><!--page wrapper -->
        
        	<div class="container">
			    <div class="row-fluid">
		        	<form action="" method="POST" id='mailchimp_form'>
			        	<div class="input-append">
			        		<input id='email' name="email" type="email" placeholder="Enter your email">
			        		<button class="btn">Submit</button>
			        	</div>
		        	</form>
		        	<div id="error"></div>
	
	        	</div>
        	</div>
        </div> <!--end of wrap-->
        
        <footer><!--page footer -->

        </footer><!--end of footer-->
        
        
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