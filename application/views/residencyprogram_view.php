<?php

if(isset($residencyProgram))
{
	foreach($residencyProgram as $program):?>

	<!--On mobile devices, these should stack so the user can scroll down.  on bigger screens - display 3xn table -->
	<div class="col-sm-4">
		<div class = "panel panel-default">
			<div class="panel-body">
				<p class = "lead no-bottom"> <?php echo $program->program_name ?> </p>
				<p> State: <?php echo $program->state ?> </p>
			</div>
		</div>
	</div>

	<?php endforeach;
} ?>


