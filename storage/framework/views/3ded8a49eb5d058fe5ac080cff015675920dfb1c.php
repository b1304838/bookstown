<?php $__env->startSection('title', 'Danh sách books'); ?>
<?php $__env->startSection('header', 'Danh sách'); ?>

<?php $__env->startSection('content'); ?>
	<?php echo Breadcrumbs::render('listbook'); ?>

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
	<div class="table-responsive">
		<table class="table">
			<tr class="success">
				<th>Mã sách</th>
				<th>Tên sách</th>
				<th>Tác giả</th>
				<th>Thể loại</th>
				<th>NXB</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thao tác</th>
			</tr>
		<?php foreach($list as $book): ?>
			<tr>
				<td><a href="<?php echo e(url("admin/bookorder/$book->book_id")); ?>"><?php echo e($book['book_id']); ?></a></td>
				<td><?php echo e($book['name']); ?></td>
				<td><?php echo e($book['author']); ?></td>
				<td><?php echo e($book->category->name); ?></td>
				<td><?php echo e($book['publisher']); ?></td>
				<td><?php echo e($book['price']); ?>đ</td>
				<td><?php echo e($book->quantity); ?></td>
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
	<br/>
	<div><i>"Click vào mã sách để xem những hóa đơn của sách"</i></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>