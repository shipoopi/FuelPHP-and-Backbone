<?php echo Form::open(); ?>
	<p>
		<label for="name">Name:</label>
		<?php echo Form::input('name', Input::post('name', isset($flashdrives) ? $flashdrives->name : '')); ?>
	</p>
	<p>
		<label for="brand">Brand:</label>
		<?php echo Form::input('brand', Input::post('brand', isset($flashdrives) ? $flashdrives->brand : '')); ?>
	</p>
	<p>
		<label for="capacity">Capacity:</label>
		<?php echo Form::input('capacity', Input::post('capacity', isset($flashdrives) ? $flashdrives->capacity : '')); ?>
	</p>
	<p>
		<label for="price">Price:</label>
		<?php echo Form::input('price', Input::post('price', isset($flashdrives) ? $flashdrives->price : '')); ?>
	</p>
	<p>
		<label for="description">Description:</label>
		<?php echo Form::textarea('description', Input::post('description', isset($flashdrives) ? $flashdrives->description : '')); ?>
	</p>

	<div class="actions">
		<?php echo Form::submit(); ?>	</div>

<?php echo Form::close(); ?>