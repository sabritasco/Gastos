<?php if (!empty($error)) : ?>
	<div class="text-center text-danger border border-danger rounded p-2">
		<span>
			<i class="fa fa-bug"></i>
		</span>
		<strong>Wrong:</strong> <?= $error; ?>
	</div>
<?php endif ?>

<?php if (!empty($success)) : ?>
	<div class="text-center text-success border border-success rounded p-2">
		<span>
			<i class="fa fa-bug"></i>
		</span>
		<strong>Success:</strong> <?= $success; ?>
	</div>
<?php endif ?>

<?php if (!empty($success) || !empty($error)) : ?>
	<script>
		$(document).ready(function() {
			$('.message_div').delay(5000).slideUp();
		});
	</script>
<?php endif ?>