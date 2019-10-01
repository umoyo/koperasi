<?php $__env->startSection('title', 'Artikel'  ); ?>
<?php $__env->startSection('key', ' ' ); ?>
<?php $__env->startSection('desc',  strip_tags('aa') .' '. \Illuminate\Support\Str::words(strip_tags('a'), 160,'') ); ?>
<?php $__env->startSection('canonical'); ?>    <link rel="canonical" href="<?php echo e(url('artikel/')); ?>" /> <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?> 

<p>
<ol class="breadcrumb" >
  <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
  <li><a href="<?php echo e(url('amp/artikel')); ?>">amp</a></li>
  <li><a href="<?php echo e(url('amp/artikel')); ?>">artikel</a></li>
</ol>
</p>

<div class="artikeltampil">Artikel</div>
<?php if( $artikel->count() < 1): ?>
<div>
"Maaf artikel yang anda cari belum tersedia" 
</div>
<?php else: ?>
	
	<?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<a target="_blank" href="<?php echo e(url( 'amp/artikel',$b->slug)); ?>"> 
		
	<div class="artikellist">
	    <div>
	    <?php echo $b->judul; ?>

	    </div>
	</div>
	    </a>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<div class="page">
<?php echo $artikel->links(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/kategoriArtikel_amp.blade.php ENDPATH**/ ?>