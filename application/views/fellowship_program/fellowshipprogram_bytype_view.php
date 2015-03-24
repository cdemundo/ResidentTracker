<label for="selectFelProgram">Select Fellowship</label>
<select class="form-control" id="selectFelProgram" name="selectFelProgram">
	<?php
	foreach($fellowshipPrograms as $program)
	{	
		echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
	} 
	?>
</select>