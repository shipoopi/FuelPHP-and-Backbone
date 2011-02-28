<h2>Listing flashdrives</h2>

<table>
	<tr>
		<th>Name</th>
		<th>Brand</th>
		<th>Capacity</th>
		<th>Price</th>
		<th>Description</th>
		<th></th>
		<th></th>
		<th></th>
	</tr>

	<?php foreach ($flashdrives as $flashdrives): ?>	<tr>

		<td><?php echo $flashdrives->name; ?></td>
		<td><?php echo $flashdrives->brand; ?></td>
		<td><?php echo $flashdrives->capacity; ?></td>
		<td><?php echo $flashdrives->price; ?></td>
		<td><?php echo $flashdrives->description; ?></td>
		<td><?php echo HTML::anchor('flashdrives/view/'.$flashdrives->id, 'View'); ?></td>
		<td><?php echo HTML::anchor('flashdrives/edit/'.$flashdrives->id, 'Edit'); ?></td>
		<td><?php echo HTML::anchor('flashdrives/delete/'.$flashdrives->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></td>
	</tr>
	<?php endforeach; ?></table>

<br />

<?php echo HTML::anchor('flashdrives/create', 'Add new Flashdrives'); ?>