<?php if(Auth::user()->username != $user->username): ?>
	<script type="text/javascript">
		window.location = '<?php echo e(url('/')); ?>';
	</script>
<?php endif; ?>


<?php $__env->startSection('title', 'Books Town'); ?>

<?php $__env->startSection('body'); ?>
	<?php if($errors->count() > 0): ?>
		<script>
			bootbox.alert('Vui lòng điền đầy đủ và chính xác thông tin');
		</script>
	<?php /* <?php else: ?>
		<script>
			bootbox.alert('Cập nhật thông tin thành công');
		</script> */ ?>
	<?php endif; ?>
	<?php if(session('success')): ?>
		<script>
			bootbox.alert('Cập nhật thông tin thành công');
		</script>
	<?php endif; ?>
	<div class="container">
		<div class="well">
			<h3>Thông tin người dùng</h3>
			<div class="col col-sm-3">
				<img class="img-thumbnail" src="<?php echo e(asset('public/img/avatars')); ?>/<?php echo e($user->avatar); ?>" height="50%" />
			</div>
			<div class="col col-sm-9">
				Họ và tên: <?php echo e($user->fullname); ?>

				<br/>
				Địa chỉ: <?php echo e($user->address); ?>

				<br/>
				Số điện thoại: <?php echo e($user->phone); ?>

				<br/>
				Email: <?php echo e($user->email); ?>

			</div>
			<br/>
			<br/>
			<button class="btn-block" data-toggle="collapse" data-target="#form"><span class="glyphicon glyphicon-edit symbol"></span></button>
			<br/>
			<div class="container">
			<div id="form" class="collapse">
				<form action="<?php echo e(route('postUserInfo')); ?>" method="post">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
					<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>" />
					<div class="form-group">
						<label style="color: #222;">Số điện thoại:</label>
						<input class="form-control" type="text" name="phone" value="<?php echo e($user->phone); ?>" />
						<?php if($errors->has('phone')): ?>
							<div class="error"><?php echo e($errors->first('phone')); ?></div>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label style="color: #222;">Địa chỉ</label>
						<input class="form-control" type="text" name="address" value="<?php echo e($user->address); ?>" />
						<?php if($errors->has('address')): ?>
							<div class="error"><?php echo e($errors->first('address')); ?></div>
						<?php endif; ?>
					</div>
					<button class="btn btn-success" type="submit" name="submit" value="info">Cập nhật thông tin</button>
				</form>
				<form action="<?php echo e(route('postUserPass')); ?>" method="post">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
					<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>" />
					<div class="form-group">
						<label style="color: #222;">Mật khầu</label>
						<input class="form-control" type="password" name="password" />
						<?php if($errors->has('password')): ?>
							<div class="error"><?php echo e($errors->first('password')); ?></div>
						<?php endif; ?>
					</div>
					<div class="form-group">
						<label style="color: #222;">Nhập lại mật khẩu</label>
						<input class="form-control" type="password" name="repassword" />
						<?php if($errors->has('repassword')): ?>
							<div class="error"><?php echo e($errors->first('repassword')); ?></div>
						<?php endif; ?>
					</div>
					<button class="btn btn-success" type="submit" name="submit" value="changepwd">Thay đổi mật khẩu</button>
				</form>
			</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>