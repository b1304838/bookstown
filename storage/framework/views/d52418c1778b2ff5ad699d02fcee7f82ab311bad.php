<form method="post" action="<?php echo e(route('postContact')); ?>">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
	<input type="text" name="name"/>
	<input type="text" name="pass"/>
	<input type="submit" value="Send"/>
</form>