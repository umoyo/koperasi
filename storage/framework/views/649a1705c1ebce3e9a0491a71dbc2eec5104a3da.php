<?php $__env->startSection('title', 'pembuatan Web site profesional bantul jogja -' ); ?>
<?php $__env->startSection('key', 'website jogja' ); ?>
<?php $__env->startSection('desc',''); ?>

    <?php $__env->startSection('canonical'); ?>
    <link rel="canonical" href="<?php echo e(url('amp/produk')); ?>" />
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('markup'); ?>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[
     	<?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
    {
      "@type":"ListItem",
      "position":<?php echo e($index +1); ?>,
      "url":"<?php echo e(url('amp/paket/'.$item->slug)); ?>"
    },
  
     	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      {
      "@type":"ListItem",
      "position": 1000,
      "url":"<?php echo e(url('amp/produk/')); ?>"
    }  
  ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<p>
<ol class="breadcrumb">
  <li class="um"><a href="<?php echo e(url('/')); ?>">Home</a></li>
  <li class="um"><a href="<?php echo e(url('/amp/produk')); ?>">paket web</a></li>
 
</ol>
</p>
<div class="grid-container">
<?php $__currentLoopData = $paket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <a  target="_blank"  href="<?php echo e(url('amp/produk',$pak->slug)); ?>" > 
  <div class="kepala" style="background:<?php echo e($pak->warna); ?>"><?php echo e($pak->nama); ?></div>
  <div class="badan"> 
  <?php $__currentLoopData = explode('.', $pak -> deskripsi); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div> 
    <?php echo e($layanan); ?>

  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
  <?php if(!is_null($pak->biaya )): ?>
  <div class="kaki">	<?php echo e('Rp'.' '. number_format( $pak->biaya ,2)); ?> </div>
  <?php else: ?>
  <div class="kaki">	Call </div>

  <?php endif; ?>
  </a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<hr>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/paketweb_amp.blade.php ENDPATH**/ ?>