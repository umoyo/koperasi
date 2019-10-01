<?php $__env->startSection('title',  $submenuKonten->nama .' -' ); ?>
<?php $__env->startSection('key',    $submenuKonten->nama ); ?>
<?php $__env->startSection('desc', \Illuminate\Support\Str::words(strip_tags( $submenuKonten->deskripsi), 160,'')); ?>

    <?php $__env->startSection('canonical'); ?>
<link rel="canonical" href="<?php echo e(url('amp/showartikel/'.$submenuKonten->slug)); ?>" />
    <?php $__env->stopSection(); ?>
    
<?php $__env->startSection('markup'); ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://www.nusakeatifjaya.com.com/showartikel"
  },
  "headline": "Article headline",
  "image": [
    "<?php echo e(url('foto_showartikel/'.$submenuKonten->foto_showartikel)); ?>"
   ],
  "datePublished": "<?php echo e($submenuKonten->created_at); ?>",
  "dateModified": "<?php echo e($submenuKonten->updated_at); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo e($submenuKonten->nama); ?>"
  },
    "publisher": {
    "@type": "Organization",
    "name": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(strip_tags($tampil->nama)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(asset('icon/'.$tampil->logo)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
    }
  },
  "description": "<?php echo strip_tags(substr($submenuKonten->deskripsi,0,160)); ?>"
}
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "<?php echo e(url('/')); ?>",
      "name": "home"
    }
  },{
    "@type": "ListItem",
    "position": 2,
    "item": {
      "@id": "<?php echo e(url('amp')); ?>",
      "name": "Amp"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "<?php echo e(url('showartikel/')); ?>",
      "name": "showartikel"
    }
  },{
    "@type": "ListItem",
    "position": 4,
    "item": {
      "@id": "<?php echo e(url('amp/showartikel/'.$submenuKonten->slug)); ?>",
      "name": "<?php echo e($submenuKonten->nama); ?>",
      "image": "<?php echo e(asset('gambar_showartikel/'.$submenuKonten->foto_showartikel)); ?>"
    }
  }
  ]
}
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class=" bodyshowartikel">
	  <p>
    <ol class="breadcrumb">
      <li class="um"><a href="<?php echo e(url('/')); ?>">Home</a></li>
      <li class="um"><a href="<?php echo e(url('/showartikel')); ?>">Amp</a></li>
      <li class="um"><a href="<?php echo e(url('/showartikel')); ?>">showartikel</a></li>
      <li class="um"><a href="<?php echo e(url('/amp/showartikel/'. $submenuKonten->slug)); ?>"><?php echo substr($submenuKonten->judul,0,10); ?>...</a></li>
    </ol>
    </p>

	<div class="showartikeltampil" ><?php echo e($submenuKonten->nama); ?> </div>
	 	<div class="admin" > 
  		<span class="fa fa-user"></span> <?php echo e($submenuKonten->nama); ?> | 
	  	<span class="fa fa-calendar"></span> <?php echo e($submenuKonten->created_at); ?> | 
  	  <a href="<?php echo e(url('showartikel/pdf/'.$submenuKonten->slug)); ?>">
      <span class="fa fa-print"></span> Cetak
      </a>    	
    </div>

	<div align="center">
		<?php if($submenuKonten->foto_showartikel): ?>
		<amp-img alt="$submenuKonten->foto_showartikel}}"
             src="<?php echo e(asset('gambar_showartikel/'.$submenuKonten->foto_showartikel)); ?>"
             width="900"
             height="675"
             layout="responsive">
        </amp-img>
		<?php else: ?>
		<?php endif; ?>
	</div>

  <div class="text"><?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $submenuKonten->deskripsi); ?></div>

  <div ><strong>Bagikan</strong></div>
    <a href="<?php echo e('http://www.facebook.com/sharer.php?u='. url('showartikel/'.$submenuKonten->slug)); ?>" class="fa fa-facebook media sosial-facebook"></a>
    <a href="<?php echo e('https://twitter.com/share?url='.url('showartikel/'.$submenuKonten->slug).'&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons'); ?>" class="fa fa-twitter  media sosial-twitter"></a>
    <a href="<?php echo e('https://plus.google.com/share?url='.url('showartikel/'.$submenuKonten->slug)); ?>" class="fa fa-google media sosial-google"></a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/kontenMenu_amp.blade.php ENDPATH**/ ?>