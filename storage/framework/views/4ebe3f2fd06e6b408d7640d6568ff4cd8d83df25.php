<?php $__env->startSection('title', 'Đăng ký'); ?>
<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/custom.css')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="container register">
		<?php /* <?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?> */ ?>
		<div class="col-sm-offset-2 col-sm-8">
			<div class="title-form">Đăng ký</div>
			<?php if(session('result')): ?>
				<div class="alert alert-success">
					<ul>
						<li><?php echo e(session('result')); ?></li>
					</ul>
				</div>
			<?php endif; ?>
			<form class="form-horizontal" action="<?php echo e(route('postRegister')); ?>" method="post">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6" style="text-align: center;">
						<img  id="current" src="<?php echo e(asset('public/img/avatars/boy-3.png')); ?>" height="64px" />
					</div>
				</div>
				<?php /* avatar */ ?>
				<input type="hidden" name="avatar" id="avatar" value="boy-3.png" />
				<input type="hidden" name="book_id" value=""/>
				<div class="form-group">
					<label class="control-label col-sm-3">Tên người dùng</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="username" value="<?php echo e(old('username')); ?>"/>
					<div class=""></div>
					<?php if($errors->has('username')): ?>
						<div class="error"><?php echo e($errors->first('username')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Chọn avatar</label>
					<div class="col-sm-offset-3">
						<span><img src="<?php echo e(asset('public/img/avatars/boy-3.png')); ?>" height="64px" name="boy-3.png" /></span>
						<span><img src="<?php echo e(asset('public/img/avatars/man-1.png')); ?>" height="64px" name="man-1.png" /></span>
						<span><img src="<?php echo e(asset('public/img/avatars/girl-1.png')); ?>" height="64px" name="girl-1.png" /></span>
						<span><img src="<?php echo e(asset('public/img/avatars/girl-2.png')); ?>" height="64px" name="girl-2.png" /></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Email</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="email" value="<?php echo e(old('email')); ?>"/>
					<?php if($errors->has('email')): ?>
						<div class="error"><?php echo e($errors->first('email')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Mật khẩu</label>
					<div class="col-sm-6"><input class="form-control" type="password" name="password" value=""/>
					<?php if($errors->has('password')): ?>
						<div class="error"><?php echo e($errors->first('password')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Xác nhận mật khẩu</label>
					<div class="col-sm-6"><input class="form-control" type="password" name="repassword" value=""/>
					<?php if($errors->has('repassword')): ?>
						<div class="error"><?php echo e($errors->first('repassword')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Họ tên</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="fullname" value="<?php echo e(old('fullname')); ?>"/>
					<?php if($errors->has('fullname')): ?>
						<div class="error"><?php echo e($errors->first('fullname')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Giới tính</label>
					<div class="col-sm-6">
						<select name="gender">
							<option value="nam">Nam</option>
							<option value="nữ">Nữ</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Địa chỉ</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="address" value="<?php echo e(old('address')); ?>"/>
					<?php if($errors->has('address')): ?>
						<div class="error"><?php echo e($errors->first('address')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Số điện thoại</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="phone" value="<?php echo e(old('phone')); ?>"/>
					<?php if($errors->has('phone')): ?>
						<div class="error"><?php echo e($errors->first('phone')); ?></div>
					<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6"><button class="btn btn-success" type="submit" name="register">Đăng ký</button></div>
				</div>
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php echo e(asset('public/js/jquery.min.js')); ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			// Chức năng chọn avatar
			$('img').click(function(){
				$('#current').attr('src', $(this).attr('src'));
				$('#avatar').val($(this).attr('name'));
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>