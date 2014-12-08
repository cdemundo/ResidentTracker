<?php

if(isset($residencyProgram))
{

	foreach($residencyProgram as $program):?>
	<!-- Uses col-sm so that on mobile devices, these should stack so the user can scroll down.  on bigger screens - display 3xn table -->
	
	<div class="col-sm-4">
		<div class = "panel panel-default">
			<div class="panel-body" style="height: 200px;">
				<a href='<?php echo site_url();?>residencyprogram/getProgram/<?php echo $program->program_name ?>' class="lead bottom-spacer"> <?php echo $program->program_name ?> </a>
				<p class="top-spacer"> State: <?php echo $program->state ?> </p>
				<p> Director: <?php echo $program->director ?> </p>
			</div>
		</div>
	</div>

	<?php endforeach;
} ?>


