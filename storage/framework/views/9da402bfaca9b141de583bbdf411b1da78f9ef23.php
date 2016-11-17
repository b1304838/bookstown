<?php $__env->startSection('title', 'JCAROUSEL'); ?>
<?php $__env->startSection('header', 'JCAROUSEL'); ?>

<?php $__env->startSection('content'); ?>
	<div class="wrapper">
		<div class="jcarousel-wrapper">
			<div class="jcarousel">
                <ul>
           			<li>
           				<img src="<?php echo e(asset('public/uploads/images/ConanTap89.jpg')); ?>"  />
       				<li>
        				<img src="<?php echo e(asset('public/uploads/images/ConanTap89.jpg')); ?>"  />
        			</li>            
        			<li>
        				<img src="<?php echo e(asset('public/uploads/images/ConanTap89.jpg')); ?>"  />
       				</li>
       				<li>
        				<img src="<?php echo e(asset('public/uploads/images/ConanTap89.jpg')); ?>"  />
      				</li>                        
                </ul>
            </div>

                <!-- <p class="photo-credits">
                    Photos by <a href="http://www.mw-fotografie.de">Marc Wiegelmann</a>
                </p> -->

            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
        </div>
    </div>
    <script type="text/javascript">
		$(function() {
		    $('.jcarousel').jcarousel({
		        // Configuration goes here
		    });
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pages.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>