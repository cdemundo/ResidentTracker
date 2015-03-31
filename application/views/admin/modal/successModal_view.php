<div class = "col-sm-12">
	<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
        <div class="panel-body">
        	<?php 
        		if(!empty($successHeading))
        		{
            		echo '<p class="alert-success text-center">' . $successHeading . '</p>'; 
            	}
            	else
        		{
        			if(!empty($errorHeading))
        			{
            			echo '<p class="alert-error text-center">' . $errorHeading . '</p>'; 
            		}
            	}
        	?>
        </div>
    </div><!--panel panel-default-->
    </div><!-- col-sm-5 col-sm-offset-4-->
        <div id = "formGoesHere" class="col-sm-10 col-sm-offset-1">
        	<div class = "panel panel-default">
				<div class="panel-body text-center">
					<div class = "col-sm-8 col-sm-offset-2">
						<?php 
                        	if(!empty($successMessage))
                        	{
                        		echo '<p class="text-center"><b>' . $successMessage . '</b></p>'; 
                        	}
                        	else
                        	{
                        		if(!empty($errorMessage))
                        		{
                        			echo '<p class="text-center"><b>' . $errorMessage . '</b></p>';
                        		}
                        	}
                    	?>	
                	</div>
				</div>
			</div>
    </div><!--formGoesHere -->
</div>