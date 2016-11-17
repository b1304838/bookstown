<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/custom.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="container register">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="title-form">Đăng nhập</div>
			<form class="form-horizontal" action="<?php echo e(route('postLogin')); ?>" method="post">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
				<input type="hidden" name="book_id" value=""/>
				<div class="form-group">
					<label class="control-label col-sm-3">Tên người dùng</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="username" value="<?php echo e(old('username')); ?>"/>
					<div class=""></div>
					<?php if($errors->has('username')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('username')); ?>

					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Mật khẩu</label>
					<div class="col-sm-6"><input class="form-control" type="password" name="password" value=""/>
					<?php if($errors->has('password')): ?>
						<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('password')); ?>

					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6"><button class="btn btn-success" type="submit" name="login">Đăng Nhập</button></div>
				</div>
			</form>
		</div>
		<div class="col col-xs-12">
			<div class="col col-xs-12 col-sm-offset-4 col-sm-4">
				Chưa có tài khoản? <a href="<?php echo e(url('register')); ?>">Đăng ký</a>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>