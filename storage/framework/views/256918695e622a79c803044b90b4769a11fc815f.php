<form action="<?php echo e(route('getUpload')); ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
	<input type="file" name="image"/>
	<input type="submit" name="submit" value="Upload"/>
</form>