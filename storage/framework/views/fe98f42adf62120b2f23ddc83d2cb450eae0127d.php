<?php $__env->startSection('title', 'Sách giảm giá'); ?>
<?php $__env->startSection('header', 'Sách giảm giá'); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<form action="<?php echo e(route('addSaleoff')); ?>" method="post" class="form">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
			<div class="col col-sm-4 col-sm-offset-4 form-group">
				<div><label>Nhập mã sách</label></div>
				<input class="form-control" type="text" name="book_id" />
				<?php if($errors->has('book_id')): ?>
					<div class="error">
						<?php echo e($errors->first('book_id')); ?>

					</div>
				<?php endif; ?>
				<?php /* <select class="form-control" name="id">
					<?php foreach($books as $book): ?>
						<option value="<?php echo e($book->book_id); ?>"><?php echo e($book->name); ?></option>
					<?php endforeach; ?>
				</select> */ ?>
			</div>
			<div class="col col-sm-12"></div>
			<div class="col col-sm-4 col-sm-offset-4 form-group">
				<div><label>Phần trăm giảm giá</label></div>
				<input class="form-control" type="text" name="percent"/>	
			</div>
			<div class="col col-sm-4 col-sm-offset-4">
				<button class="btn btn-success btn-block" type="submit">Thêm</button>
			</div>
		</form>
	</div>
	<br/>
	<table class="table">
		<tr class="success">
			<th>Mã sách</th>
			<th>Tên sách</th>
			<th>Giảm giá</th>
			<th></th>
		</tr>
		<?php foreach($promotion as $book): ?>
			</tr>
				<td><?php echo e($book->book_id); ?></td>
				<td>
					<?php
						$bk = App\Book::where('book_id', $book->book_id)->get()->first();
						echo $bk->name;
					?>
				</td>
				<td><?php echo e($book->percent); ?>%</td>
				<td>
					<a class="btn btn-default btn-xs" href="<?php echo e(url("admin/delsaleoff/$book->book_id")); ?>">
						<span class="glyphicon glyphicon-trash"></span> Xóa
					</a>
				</td>
			<tr>
		<?php endforeach; ?>
	</table>
	<div><?php echo e($promotion->links()); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>