<div class="col-sm-6 col-sm-offset-3 text-center">
	<form id = 'selectForm' action = "<?php echo site_url();?>fellows/getFellow" method = "post">
		<h4 class = "text-center">Fellows Found</h4>
		<div class = "form-group">
		<select class="form-control" id="selectFellow" name="selectFellow">
		<?php
			foreach($allFellows as $id => $name)
			{	
				echo '<option value ="' . $id . '">' . $name . '</option>';
			} 
		?>
		</select>
		</div>

		<button type="submit" class="btn btn-primary text-center" id="selectBtn">Go</button>
	</form>
</div>