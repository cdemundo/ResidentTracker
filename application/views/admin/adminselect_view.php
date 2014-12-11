<label for="selectRes">Residency Program</label>
<select class="selectpicker form-control" id="selectRes" name="selectRes">
<?php
	foreach($residencyProgram as $program)
	{	
		echo '<option value ="' . $program->program_name . '">' . $program->program_name . '</option>';
	} 
?>
</select>