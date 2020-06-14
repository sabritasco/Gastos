<?php if (!empty($error)) { ?>
	<div class="text-center text-danger border border-danger rounded p-2">
		<span>
			<i class="fa fa-bug"></i>
		</span>
		<strong>Wrong:</strong> <?php echo $error; ?>
	</div>
<?php } ?>

<?php if (!empty($success)) { ?>
	<div class="text-center text-success border border-success rounded p-2">
		<span>
			<i class="fa fa-bug"></i>
		</span>
		<strong>Success:</strong> <?php echo $success; ?>
	</div>
<?php } ?>

<?php if (isset($_GET['success']) and $_GET['success'] == "logout") {
	$success = LOGIN_CLOSE; ?>
	<div class="text-center text-success border border-success rounded p-2">
		<span>
			<i class="fa fa-bug"></i>
		</span>
		<strong>Success:</strong> <?php echo $success; ?>
	</div>
<?php } ?>

<?php if (!empty($success) || !empty($error)) { ?>
	<script>
		$(document).ready(function() {
			$('.message_div').delay(5000).slideUp();
		});
	</script>
<?php } ?>