<?php $__env->startSection('title'); ?>
	<?php echo e($title->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="container margin main">
		<div class="subject">
			<div class="arrow-one"></div><div class="subject-title"><?php echo e($title->name); ?></div><div class="arrow-two"></div>
		</div>
		<div class="field">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<?php foreach($listbook as $book): ?>
							<td class="photo">
								<div class="one-picture">
								<a href="<?php echo e(url('books')); ?>/<?php echo e($book['book_id']); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book['image']); ?>" height="250px"/>
								<?php /* Hiển thị giảm giá */ ?>
								<?php if(App\Promotion::where('book_id', $book->book_id)->count() > 0): ?>
									<div class="saleoff">-<?php echo e(App\Promotion::where('book_id', $book->book_id)->get()->first()->percent); ?>%</div>
								<?php endif; ?>
								</a>
								<br/><br/>
								<?php echo e($book['name']); ?>

								<br/>
								Giá: <?php /* <?php echo e(number_format($book['price'])); ?>đ */ ?>
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
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($book['book_id']); ?>">
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
			<div class="paginate"><?php echo e($listbook->links()); ?></div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>