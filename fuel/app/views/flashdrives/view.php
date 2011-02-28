<p>
	<strong>Name:</strong>
	<?php echo $flashdrives->name; ?></p>
<p>
	<strong>Brand:</strong>
	<?php echo $flashdrives->brand; ?></p>
<p>
	<strong>Capacity:</strong>
	<?php echo $flashdrives->capacity; ?></p>
<p>
	<strong>Price:</strong>
	<?php echo $flashdrives->price; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $flashdrives->description; ?></p>

<?php echo HTML::anchor('flashdrives/edit/'.$flashdrives->id, 'Edit'); ?> | 
<?php echo HTML::anchor('flashdrives', 'Back'); ?>