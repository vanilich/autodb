<?php
	$messages = $this->container->flash->getMessages();
?>

<?php foreach ($messages as $key => $value) { ?>
	<?php $classname = md5(rand(0, 1000) . uniqid()); ?>

	<div class="alert alert-<?php echo $key;?>" role="alert" id="msg-<?php echo $classname; ?>">
	    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	    </button> 

	    <?php foreach ($value as $msg) { ?>
	    	<?php echo $msg; ?> <br/>
	    <?php } ?>
	</div>
	<script type="text/javascript">
		(function() {
			var hide = function (elem) {
				elem.style.display = 'none';
			};

			setTimeout(function() {
				hide( document.getElementById('msg-<?php echo $classname?>') );
			}, 5000)			
		})();
	</script>
 <?php } ?>