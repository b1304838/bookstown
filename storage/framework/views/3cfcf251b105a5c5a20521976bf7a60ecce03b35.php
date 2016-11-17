<?php $__env->startSection('title', 'Phản hồi - Đóng góp ý kiến'); ?>

<?php $__env->startSection('body'); ?>
	<div class="container ">
		<div class="well">
			<h3>Góp ý</h3>
			<form action="<?php echo e(route('postContact')); ?>" method="post">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
				<div class="form-group">
					<label style="color: #222;">Email</label>
					<input type="text" name="email" class="form-control" />	
					<?php if($errors->has('email')): ?>
						<div class="error"><?php echo e($errors->first('email')); ?></div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label style="color: #222;">Nội dung</label>
					<textarea class="form-control" rows="5" name="message"></textarea>	
					<?php if($errors->has('message')): ?>
						<div class="error"><?php echo e($errors->first('message')); ?></div>
					<?php endif; ?>
				</div>
				<button class="btn btn-info btn-block" type="submit">Gửi</button>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>