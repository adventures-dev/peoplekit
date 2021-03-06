<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>THE SPARK CARDS</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="A time-effective and hassie free quarterly subscription service for leaders that helps to grow your team and employees.">
        
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-2337332-57', 'peoplekit.co');
		  ga('send', 'pageview');
		
		</script>
        
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
				    		<img src="assets/img/spark.jpg">
				    	</div>
				    	<div id="subheader1">
							Coming Soon to Kickstarter
				    	</div>
				    	
				    	<div id="subheader2">
				    		Stay Informed
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