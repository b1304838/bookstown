<form action="<?php echo e(route('getLogin')); ?>" method="post">
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
	username:
	<input type="text" name="username"/>
	email:
	<input type="text" name="email"/>
	password:
	<input type="password" name="password"/>
	<input type="submit" name="login" value="Login"/>
</form>