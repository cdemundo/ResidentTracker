<div class="col-sm-6 col-sm-offset-3 text-center">
	<form id = 'selectForm' action = "<?php echo site_url();?>residents/getResident" method = "post">
		<h4 class = "text-center">Residents Found</h4>
		<div class = "form-group">
		<select class="form-control" id="selectRes" name="selectRes">
		<?php
			foreach($allResidents as $resident)
			{	
				echo '<option value ="' . $resident->id . '">' . $resident->firstname . " " . $resident->lastname . " - " . $resident->program_name . '</option>';
			} 
		?>
		</select>
		</div>

		<button type="submit" class="btn btn-primary text-center" id="selectBtn">Go</button>
	</form>
</div>