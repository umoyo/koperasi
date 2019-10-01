<?php $__env->startSection('title', $showartikel->judul .' -' ); ?>
<?php $__env->startSection('key', $showartikel->tag ); ?>
<?php $__env->startSection('desc', \Illuminate\Support\Str::words(strip_tags($showartikel->kiriman), 160,'')); ?>

    <?php $__env->startSection('canonical'); ?>
<link rel="canonical" href="<?php echo e(url('amp/showartikel/'.$showartikel->slug)); ?>" />
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
    "<?php echo e(url('foto_showartikel/'.$showartikel->foto_showartikel)); ?>"
   ],
  "datePublished": "<?php echo e($showartikel->created_at); ?>",
  "dateModified": "<?php echo e($showartikel->updated_at); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo e($showartikel->nama); ?>"
  },
    "publisher": {
    "@type": "Organization",
    "name": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(strip_tags($tampil->nama)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(asset('icon/'.$tampil->logo)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
    }
  },
  "description": "<?php echo strip_tags(substr($showartikel->kiriman,0,160)); ?>"
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
      "@id": "<?php echo e(url('amp/showartikel/'.$showartikel->slug)); ?>",
      "name": "<?php echo e($showartikel->nama); ?>",
      "image": "<?php echo e(asset('gambar_showartikel/'.$showartikel->foto_showartikel)); ?>"
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
      <li class="um"><a href="<?php echo e(url('/amp/showartikel/'. $showartikel->slug)); ?>"><?php echo substr($showartikel->judul,0,10); ?>...</a></li>
    </ol>
    </p>

	<div class="showartikeltampil" ><?php echo e($showartikel-> judul); ?> </div>
	 	<div class="admin" > 
  		<span class="fa fa-user"></span> <?php echo e($showartikel->nama); ?> | 
	  	<span class="fa fa-calendar"></span> <?php echo e($showartikel->created_at); ?> | 
		  <span class="fa fa-bookmark"></span> <?php echo e($showartikel->kategori); ?> | 
  	  <a href="<?php echo e(url('showartikel/pdf/'.$showartikel->slug)); ?>">
      <span class="fa fa-print"></span> Cetak
      </a>    	
    </div>

	<div align="center">
		<?php if($showartikel->foto_artikel): ?>
		<amp-img alt="<?php echo e($showartikel->foto_showartikel); ?>"
             src="<?php echo e(asset('gambar_artikel/'.$showartikel->foto_artikel)); ?>"
             width="900"
             height="675"
             layout="responsive">
        </amp-img>
		<?php else: ?>
		<?php endif; ?>
	</div>

  <div class="text"><?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $showartikel->kiriman); ?></div>

  <div ><strong>Bagikan</strong></div>
    <a href="<?php echo e('http://www.facebook.com/sharer.php?u='. url('showartikel/'.$showartikel->slug)); ?>" class="fab fa-facebook media sosial-facebook"></a>
    <a href="<?php echo e('https://twitter.com/share?url='.url('showartikel/'.$showartikel->slug).'&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons'); ?>" class="fab fa-twitter  media sosial-twitter"></a>
    <a href="<?php echo e('https://plus.google.com/share?url='.url('showartikel/'.$showartikel->slug)); ?>" class="fab fa-google media sosial-google"></a>

  <div  class="page">
  <ul>   
	<li class="previous"> <a href="<?php echo e(url( 'amp/showartikel', $sebelum)); ?>"><i class="fa fa-angle-left"></i> Sesudah</a> </li>
	<li class="next"><a href="<?php echo e(url( 'amp/showartikel', $sesudah  )); ?>">Sebelum <i class="fa fa-angle-right"></i>
	</ul>
  </div>
  
<div class="text2">Artikel Terkait</div>
<div>
    <amp-carousel class="carousel-preview" width="auto" height="70" layout="fixed-height" type="carousel">
  		<?php $__currentLoopData = app\artikel::where('kategorikonten_id', $showartikel->kategorikonten_id )->orderByraw('rand()')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button on="" type="button">
          <a href="<?php echo e(url('amp/artikel/'.$item->slug)); ?>">
          <amp-img alt="<?php echo e($showartikel->foto_showartikel); ?>"
             src="<?php echo e(asset('gambar_artikel/'.$showartikel->foto_artikel)); ?>"
             width="80"
             height="60"
             layout="responsive">
        </amp-img>
          </a>
    </button>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </amp-carousel>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/kontenArtikel_amp.blade.php ENDPATH**/ ?>