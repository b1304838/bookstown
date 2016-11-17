<?php $__env->startSection('title', 'Danh sách thể loại'); ?>
<?php $__env->startSection('header', 'Danh sách thể loại'); ?>

<?php $__env->startSection('content'); ?>
	<?php echo Breadcrumbs::render('listcat'); ?>

	<div class="row table-responsive">
		<div class="col col-xs-12 col-sm-4 col-sm-offset-4">
			<table class="table table-bordered">
				<tr class="success">
					<th>Mã thể loại</th>
					<th>Tên thể loại</th>
				</tr>
				<?php foreach($cats as $cat): ?>
				<tr>
					<td><a href="<?php echo e(url("admin/bookcat/$cat->cat_id")); ?>"><?php echo e($cat->cat_id); ?></a></td>
					<td><?php echo e($cat->name); ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<br/>
	<div>
		<i>"Click vào mã thể loại để xem những cuốn sách có trong thể loại"</i>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>