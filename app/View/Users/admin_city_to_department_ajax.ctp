<option value="">(choose one)</option>
<?php foreach ($departments as $key => $value): ?>
	<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
<?php endforeach; ?>