<?php $__env->startSection('title', 'Books Town'); ?>

<?php $__env->startSection('body'); ?>
	<div class="container main">		
		<div class="subject">
			<div class="arrow-one"></div><div class="subject-title">Sách bán chạy</div><div class="arrow-two"></div>
		</div>
		<div class="field">
			<?php
				$books = App\OrderDetail::all()->groupBy('book_id');
    			$mang = collect();
    			foreach ($books as $bk=>$book){
        			$mang[] = ['id' => $bk, 'quantity' => $book->sum('quantity')];
    			}
    			$count = 0;
    		?>
    		<div class="table-responsive">
    			<table class="table">
    				<tr>
    				<?php foreach($mang->sortByDesc('quantity') as $bk): ?>
    				<?php $count++; ?>
    				<?php $tam = App\Book::where('book_id', $bk['id'])->get()->first(); ?>
    					<?php if($tam->status): ?>
						<td >
						<div class="one-picture">
							<a href="<?php echo e(url('books')); ?>/<?php echo e($tam->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($tam->image); ?>" height="250px"/>
								<?php if(App\Promotion::where('book_id', $tam->book_id)->count() > 0): ?>
									<div class="saleoff">-<?php echo e(App\Promotion::where('book_id', $tam->book_id)->get()->first()->percent); ?>%</div>
								<?php endif; ?>
							</a>
								<br/><br/>
								<?php echo e($tam->name); ?>

								<br/>
								Giá:
								<?php if(App\Promotion::where('book_id', $tam->book_id)->count() > 0): ?>
									<strike><?php echo e(number_format($tam->price)); ?>đ</strike>
									<?php echo e(number_format($tam->price - $tam->promotion->percent*$tam->price/100)); ?>đ
								<?php else: ?>
									<?php echo e(number_format($tam->price)); ?>đ
								<?php endif; ?>
								<br/>
								<?php /* Button đặt hàng */ ?>
								<?php $kt = false;  ?>
								<?php foreach(Cart::content() as $bk): ?>
									<?php if($bk->id == $tam->book_id): ?>
										<?php $kt = true; ?>
										<?php break; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if($tam->quantity == 0): ?>
									<div class="btn btn-warning disabled">Hết hàng
								</div>
								<?php else: ?>
								<?php if(!$kt): ?>
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($tam->book_id); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled">Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
						</td>
						<?php endif; ?>
					<?php if($count==4): ?>
						<?php break; ?>
					<?php endif; ?>
				
        		<?php endforeach; ?>
        		</tr>
				</table>
			</div>
		</div>
		<?php /* Sách mới */ ?>
		<div class="subject">
			<div class="arrow-one"></div><div class="subject-title">Sách mới</div><div class="arrow-two"></div>
		</div>
		<div class="field row">
			<div class="col col-xs-12 col-sm-3 col-sm-offset-2">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td >
						<div class="one-picture">
							<a href="<?php echo e(url('books')); ?>/<?php echo e($last->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($last->image); ?>" height="250px"/>
								<?php if(App\Promotion::where('book_id', $last->book_id)->count() > 0): ?>
									<div class="saleoff">-<?php echo e(App\Promotion::where('book_id', $last->book_id)->get()->first()->percent); ?>%</div>
								<?php endif; ?>
							</a>
								<br/><br/>
								<?php echo e($last->name); ?>

								<br/>
								Giá: 
								<?php if(App\Promotion::where('book_id', $last->book_id)->count() > 0): ?>
									<strike><?php echo e(number_format($last->price)); ?>đ</strike>
									<?php echo e(number_format($last->price - $last->promotion->percent*$last->price/100)); ?>đ
								<?php else: ?>
									<?php echo e(number_format($last->price)); ?>đ
								<?php endif; ?>
								<br/>
								<?php $kt = false;  ?>
								<?php foreach(Cart::content() as $bk): ?>
									<?php if($bk->id == $last->book_id): ?>
										<?php $kt = true; ?>
										<?php break; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if($last->quantity == 0): ?>
									<div class="btn btn-warning disabled">Hết hàng
								</div>
								<?php else: ?>
								<?php if(!$kt): ?>
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($last->book_id); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled">Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
						</td>
					</tr>
				</table>
			</div>
			</div>
			<div class="col col-xs-12 col-sm-4">
				<br/>
				<?php echo e($last->description); ?>

			</div>
		</div>
		<?php /* Sách giảm giá */ ?>
		<div class="subject">
			<div class="arrow-one"></div><div class="subject-title">Sách giảm giá</div><div class="arrow-two"></div>
		</div>
		<div class="field">
			<div class="table-responsive">
					<table class="table">
					<?php $row = 0; ?>
					<tr>
						<?php foreach(App\Promotion::all() as $book): ?>
							<?php $row++; ?>
							<?php /* Ân sách status false */ ?>
							<?php if(!App\Book::where('book_id', $book->book_id)->get()->first()->status): ?>
								<?php continue; ?>
							<?php endif; ?>
							<td >
								<div class="one-picture">
								<a href="<?php echo e(url('books')); ?>/<?php echo e($book->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book->book->image); ?>" height="250px"/>
									<?php /* Giảm giá */ ?>
									<?php
										$percent = App\Promotion::where('book_id', $book->book_id)->get()->first();
										if($percent) echo '<div class="saleoff">'.-$percent->percent.'%</div>';
									?>
								</a>
								<br/><br/>
								<?php echo e($book->book->name); ?>

								<br/>
								Giá: 
								<?php if(App\Promotion::where('book_id', $book->book_id)->count() > 0): ?>
									<strike><?php echo e(number_format($book->book->price)); ?>đ</strike>
									<?php echo e(number_format($book->book->price - $book->percent*$book->book->price/100)); ?>đ
								<?php else: ?>
									<?php echo e(number_format($book->book->price)); ?>đ
								<?php endif; ?>
								<br/>
								<?php $kt = false;  ?>
								<?php foreach(Cart::content() as $bk): ?>
									<?php if($bk->id == $book->book_id): ?>
										<?php $kt = true; ?>
										<?php break; ?>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if($book->book->quantity == 0): ?>
									<div class="btn btn-warning disabled">Hết hàng
								</div>
								<?php else: ?>
								<?php if(!$kt): ?>
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($book->book_id); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled">Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
								</div>
							</td>
							<?php if($row%4==0): ?>
								</tr><tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tr>
					</table>	
				</div>
				<div><?php echo e($listbook->links()); ?></div>
		</div>

		<div class="subject">
			<div class="arrow-one"></div><div class="subject-title">Kho sách</div><div class="arrow-two"></div>
		</div>
		<div class="field">
			<div class="table-responsive">
					<table class="table">
					<?php $row = 0; ?>
					<tr>
						<?php foreach($listbook as $book): ?>
							<?php $row++; ?>

							<td >
								<div class="one-picture">
								<a href="<?php echo e(url('books')); ?>/<?php echo e($book->book_id); ?>"><img src="<?php echo e(url('public/uploads/images')); ?>/<?php echo e($book->image); ?>" height="250px"/>
									<?php /* Giảm giá */ ?>
									<?php
										$percent = App\Promotion::where('book_id', $book->book_id)->get()->first();
										if($percent) echo '<div class="saleoff">'.-$percent->percent.'%</div>';
									?>
								</a>
								<br/><br/>
								<?php echo e($book->name); ?>

								<br/>
								Giá: 
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
								<a class="btn btn-info" href="<?php echo e(url('shoppingcart/cart')); ?>/<?php echo e($book->book_id); ?>">
									<span class="glyphicon glyphicon-shopping-cart"></span> Thêm vào giỏ hàng
								</a>
								<?php else: ?>
									<div class="btn btn-warning disabled">Đã thêm vào giỏ hàng
								</div>
								<?php endif; ?>
								<?php endif; ?>
								</div>
							</td>
							<?php if($row%4==0): ?>
								</tr><tr>
							<?php endif; ?>
						<?php endforeach; ?>
					</tr>
					</table>	
				</div>
				<div><?php echo e($listbook->links()); ?></div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pages.main.homelayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>