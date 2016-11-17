<?php $__env->startSection('title', 'Thêm thể loại sách'); ?>

<?php $__env->startSection('content'); ?>	
			<?php if(count($errors)>0): ?>

			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php if(session('result')): ?>

			<div class="alert alert-success">
				<ul>
					<li><?php echo e(session('result')); ?></li>
				</ul>
			</div>
			<?php endif; ?>
		
		
		<form action="<?php echo e(route('postCat')); ?>" method="post">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
			Mã loại
			<input type="text" name="cat_id"/>

			<br>

			Tên loại
			<input type="text" name="name"/>
			<input type="submit" name="addcat" value="Thêm thể loại"/>
		</form>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>