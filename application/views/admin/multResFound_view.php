<div class="col-sm-6 col-sm-offset-3 med-top-spacer text-center">
	<form id = 'selectResForm'>
		<h4 class = "text-center">Residents Found</h4>
		<div class = "form-group">
		<select class="form-control" id="resID" name="resID">
		<?php
			if(empty($allResidents))
			{
				echo '<option value ="0">No residents found. Please search again.</option>';
			}
			foreach($allResidents as $resident)
			{	
				echo '<option value ="' . $resident->id . '">' . $resident->firstname . " " . $resident->lastname . " - " . $resident->program_name . '</option>';
			} 
		?>
		</select>
		</div>
		<?php 
			if(isset($remove))
			{
				echo '<input type="hidden" value="' . $remove . '" name="remove" id="remove"/>';  
			} ?>

		<button type="button" class="btn btn-danger text-center" id="deleteResBtn">Delete</button>
		<button type="button" class="btn btn-primary text-center" id="updateResBtn">Update</button>
	</form>
</div>