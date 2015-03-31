<div class="col-sm-6 col-sm-offset-3 med-top-spacer text-center">
	<form id = 'selectResForm'>
		<h4 class = "text-center">Fellows Found</h4>
		<div class = "form-group">
		<select class="form-control" id="felID" name="felID">
		<?php
			if(empty($allFellows))
			{
				echo '<option value ="0">No fellows found. Please search again.</option>';
			}
			foreach($allFellows as $fellow)
			{	
				echo '<option value ="' . $fellow->id . '">' . $fellow->firstname . " " . $fellow->lastname . " - " . $fellow->program_name . '</option>';
			} 
		?>
		</select>
		</div>

		<button type="button" class="btn btn-danger text-center" id="deleteFelBtn">Delete</button>
		<button type="button" class="btn btn-primary text-center" id="updateFelBtn">Update</button>
	</form>
</div>