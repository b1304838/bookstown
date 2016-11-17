<?php $__env->startSection('title', 'Thêm thể loại sách'); ?>
<?php $__env->startSection('header', 'Thêm thể loại'); ?>

<?php $__env->startSection('content'); ?>	
			<?php /* <?php if(count($errors)>0): ?>

			<div class="alert alert-danger">
				<ul>
					<?php foreach($errors->all() as $error): ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?> */ ?>

			<?php if(session('result')): ?>

			<div class="alert alert-success">
				<ul>
					<li><?php echo e(session('result')); ?></li>
				</ul>
			</div>
			<?php endif; ?>
		
		<div class="col-sm-offset-1 col-sm-10">
			<form class="form-horizontal" action="<?php echo e(route('postCat')); ?>" method="post">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
				<div class="form-group">
					<label class="control-label col-sm-3">Mã thể loại</label>
					<div class="col-sm-3"><input type="text" name="cat_id" value="<?php echo e(old('cat_id')); ?>" placeholder="Nhập mã thể loại" />	
					</div>
					<div class="col-sm-6 error">
						<?php if($errors->has('cat_id')): ?>
							<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('cat_id')); ?>

						<?php endif; ?>
					</div>
				</div>
				
				

				<div class="form-group">
					<label class="control-label col-sm-3">Tên thể loại</label>
					<div class="col-sm-3"><input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Nhập tên thể loại" /></div>
					<div class="col-sm-6 error">
						<?php if($errors->has('name')): ?>
							<span class="glyphicon glyphicon-warning-sign"></span><?php echo e($errors->first('name')); ?>

						<?php endif; ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-9"><button class="btn btn-success" type="submit" name="addcat">Thêm thể loại</button></div>
				</div>
			</form>
		</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>