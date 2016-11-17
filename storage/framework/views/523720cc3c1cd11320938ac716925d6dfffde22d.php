<?php $__env->startSection('title', 'Tìm kiếm'); ?>

<?php $__env->startSection('body'); ?>
	<div class="container margin">
		<?php if($result->count() == 0): ?>
			<div class="alert alert-danger"><?php echo e("Không tìm thấy kết quả"); ?></div>
		<?php else: ?>
			<div class="main">
			<div class="subject">
				<div class="arrow-one"></div><div class="subject-title">Kết quả tìm kiếm</div><div class="arrow-two"></div>
			</div>
			<div class="table-responsive">
					<table class="table">
					<tr>
						<?php foreach($result as $book): ?>
							<td class="photo">
								<div class="one-picture">
								<a href="<?php echo e(url('books')); ?>/<?php echo e($book->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book->image); ?>" height="250px"/>
								<?php if(App\Promotion::where('book_id', $book->book_id)->count() > 0): ?>
									<div class="saleoff">-<?php echo e(App\Promotion::where('book_id', $book->book_id)->get()->first()->percent); ?>%</div>
								<?php endif; ?>
								</a>
								<br/><br/>
								<?php echo e($book->name); ?>

								<br/>
								Giá: <?php /* <?php echo e(number_format($book->price)); ?>đ */ ?>
								<?php if(App\Promotion::where('book_id', $book->book_id)->count() > 0): ?>
									<strike><?php echo e(number_format($book->price)); ?>đ</strike>
									<?php echo e(number_format($book->price - $book->promotion->percent*$book->price/100)); ?>đ
								<?php else: ?>
									<?php echo e(number_format($book->price)); ?>đ
								<?php endif; ?>
								<br/>
								<?php $kt = false;  ?>
								<?php foreach(Cart::content() as $bk): ?>
									<?php if($bk->id == $book->book_id): ?>
										<?php $kt = true; ?>
										<?php break; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if($book->quantity == 0): ?>
									<div class="btn btn-warning disabled">Hết hàng
								</div>
								<?php else: ?>
								<?php if(!$kt): ?>
								<a class="btn btn-info" href="<?php echo e(url("shoppingcart/cart/$book->book_id")); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled" >Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
								<?php /* <div class="saleoff">15%</div>	 */ ?>
								</div>
							</td>
						<?php endforeach; ?>
					</tr>
					</table>	
				</div>
			<?php echo e($result->links()); ?>

		</div>
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>