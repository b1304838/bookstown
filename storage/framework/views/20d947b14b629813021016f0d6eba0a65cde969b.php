<?php $__env->startSection('title', 'Tìm kiếm'); ?>
<?php $__env->startSection('header', 'Tìm kiếm'); ?>

<?php $__env->startSection('content'); ?>
	<?php /* <?php if(Session::has('result')): ?>
		<div class="alert alert-danger">
			<ul>
				<li><?php echo e(session::get('result')); ?></li>
			</ul>
		</div>
	<?php endif; ?> */ ?>
	<?php /* <?php if(session('list')): ?> */ ?>
		<div class="container">
			<form action="<?php echo e(url('admin/getfindbook')); ?>" method="get">
				<?php /* <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> */ ?>
				<select name="cat">
					<option value="book_id">Mã sách</option>
					<option value="name">Tên sách</option>
					<option value="author">Tác giả</option>
					<option value="publisher">Nhà xuất bản</option>
				</select>
				<input type="text" name="find"/>
				<button class="btn btn-success btn-sm" type="submit" value="findbook">Tìm kiếm</button>
			</form>
		</div>
		<br/>
		<?php if($result->count() == 0): ?>
		<div class="alert alert-info">Không tìm thấy kết quả</div>
		<?php else: ?>
		<div class="table-responsive">
			<table class="table">
				<tr class="success">
					<th>Mã sách</th>
					<th>Tên sách</th>
					<th>Tác giả</th>
					<th>Nhà xuất bản</th>
					<th>Giá</th>
					<th>Thao tác</th>
				</tr>
				
					<?php foreach($result as $book): ?>
					<tr>
						<td><?php echo e($book['book_id']); ?></td>
						<td><?php echo e($book['name']); ?></td>
						<td><?php echo e($book['author']); ?></td>
						<td><?php echo e($book['publisher']); ?></td>
						<td><?php echo e($book['price']); ?>đ</td>
						<td><a class="btn btn-default btn-xs" href="<?php echo e(url("admin/editbook")); ?>/<?php echo e($book['book_id']); ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
						<?php if($book->status): ?>
							<a class="btn btn-default btn-xs" href="<?php echo e(url("admin/hide/$book->book_id")); ?>"><span class="glyphicon glyphicon-ok-sign"></span></a>
						<?php else: ?>
							<a class="btn btn-default btn-xs" href="<?php echo e(url("admin/unhide/$book->book_id")); ?>"><span class="glyphicon glyphicon-remove-sign"></span></a>
						<?php endif; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				
			</table>
		</div>
		<?php endif; ?>
	<?php /* <?php else: ?> */ ?>
		<?php /* <div class="alert alert-danger">
			<ul>
				<li>Không tìm thấy kết quả</li>
			</ul>
		</div> */ ?>
	<?php /* <?php endif; ?> */ ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>