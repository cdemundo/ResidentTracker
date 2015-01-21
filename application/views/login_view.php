<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    	<title>Stryker Resident Engagement</title>

    	<!-- CORE BOOTSTRAP --> 
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- PAGE SPECIFIC CSS -->
		<link href="/residentTracker/assets/css/logincss.css" rel="stylesheet">
		<link rel="stylesheet" href="/residentTracker/assets/css/validate/bootstrapValidator.min.css"/>

	</head>
	<body>
		<div class="container">
		    <div class="row">
		        <div class="col-md-4 col-md-offset-4">
		            <div class="panel panel-default" id="panel">
		                <div class="panel-heading text-center lead">Stryker Resident Engagement</div>
		                <div class="panel-body">
		                	<div class="col-xs-11">
			                    <form id="loginForm" class="form-horizontal" action="<?php echo base_url()?>login/authenticate" method="post" role="form"
			                    	data-bv-feedbackicons-valid="glyphicon glyphicon-ok"
				                    data-bv-feedbackicons-invalid="glyphicon glyphicon-remove"
				                    data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
			                        <div class="form-group">
			                            <label for="username">Username (Stryker Login)</label>
			                                <input type="text" class="form-control" id="username" name="username" placeholder="Stryker Username" size="50"
			                                data-bv-notempty = "true"
											data-bv-notempty-message="Username is required and cannot be empty"/>
			                        </div>
			                        <div class="form-group">
			                            <label for="password">Password</label>
		                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
		                                	data-bv-notempty = "true"
											data-bv-notempty-message="Password is required and cannot be empty"/>
			                        </div>
			                        <div class="form-group">
			                        	<?php if(!empty($error))
				                    		echo '<p class="error"> Username or password was incorrect. Please try again. </p>';
				                    	?>
			                        </div>
			                        <div class="form-group last">
			                                <button type="submit" class="btn btn-success btn-med pull-right top-spacer">Sign in</button>
			                        </div>
			                    </form>
			                </div>
		                </div>	
	            </div>
		        </div>
		    </div>
		</div>

		<!--CORE JS BOOTSTRAP AND JQUERY -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>		

		<!-- BOOTSTRAP VALIDATOR -->
		<script type="text/javascript" src="/residentTracker/assets/js/validate//bootstrapValidator.min.js"></script>

		<script>
			$('#loginForm').bootstrapValidator(); 
		</script>

		<script>
			$( document ).ready(function() {
				$("#panel").center(true);
			});
		</script>
		<script>
			jQuery.fn.center = function(parent) {
		    if (parent) {
		        parent = this.parent();
		    } else {
		        parent = window;
		    }
		    this.css({
		        "position": "absolute",
		        "top": ((($(parent).height() - this.outerHeight()) / 2) + $(parent).scrollTop() + "px"),
		        "left": ((($(parent).width() - this.outerWidth()) / 2) + $(parent).scrollLeft() + "px")
		    });
		return this;
		}
		</script>
	</body>
</html>