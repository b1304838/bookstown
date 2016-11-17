<?php $__env->startSection('title', 'Sách theo thể loại'); ?>
<?php $__env->startSection('header', 'Sách theo thể loại'); ?>

<?php $__env->startSection('content'); ?>
	<?php echo Breadcrumbs::render('bookcat'); ?>

	<div class="row table-responsive">
		<div class="col col-xs-12 col-sm-8 col-sm-offset-2">
			<table class="table table-bordered">
				<tr class="success">
					<th>Mã sách</th>
					<th>Tên sách</th>
					<th>Tác giả</th>
					<th>NXB</th>
					<th>Số lượng</th>
				</tr>
				<?php foreach($books as $book): ?>
				<tr>
					<td><?php echo e($book->book_id); ?></td>
					<td><?php echo e($book->name); ?></td>
					<td><?php echo e($book->author); ?></td>
					<td><?php echo e($book->publisher); ?></td>
					<td><?php echo e($book->quantity); ?></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>