   
<?php $__env->startSection('title',  'produk'  ); ?>
<?php $__env->startSection('key', ' ' ); ?>
<?php $__env->startSection('desc',  strip_tags( '') .' '. \Illuminate\Support\Str::words(strip_tags(''), 160,'') ); ?>
<?php $__env->startSection('canonical'); ?>    <link rel="canonical" href="<?php echo e(url('artikel/')); ?>" /> <?php $__env->stopSection(); ?>

    <?php $__env->startSection('canonical'); ?>
    <link rel="canonical" href="<?php echo e(url('amp/produk')); ?>" />
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('markup'); ?>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[
     	<?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
    {
      "@type":"ListItem",
      "position":<?php echo e($index +1); ?>,
      "url":"<?php echo e(url('amp/produk/'.$item->slug)); ?>"
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
  <li class="um"><a href="<?php echo e(url('/amp/produk')); ?>">amp</a></li>
  <li class="um"><a href="<?php echo e(url('/amp/produk')); ?>">Produk</a></li>
</ol>
</p>

<div class="filterproduk">
<ul>
  <li>
    <form action="<?php echo e(url('produk/cari/barang')); ?>">
      <div class="cari">
        <div>
           <input type="" name="judul" value="<?php echo e(request()->get('judul')); ?>"  placeholder="Cari">
        </div>
        <div>
          <button type="submit" value="cari" >cari</button>
        </div>
      <div>
    </form>
  </li>
  <li>
    <form action="<?php echo e(url('produk/urutkan/barang')); ?>">
      <select name="urutkan" id="urutkan" value="<?php echo e(request()->get('urutkan')); ?>" >
	      <option value="">-- urutkan --</option>
	      <option value="baru">Terbaru</option>
	      <option value="murah">Termurah</option>
	      <option value="mahal">Termahal</option>
	      <option value="a-z">A - Z</option>
	      <option value="z-a">Z - A</option>
      </select>
    </form>
  </li>
  <li>
    <form action="<?php echo e(url('produk/urutkan/barang')); ?>">
    <div class="sortir">
      <div>
        <input type="" name="min" value="<?php echo e(request()->get('min')); ?>"   placeholder="rendah"> 
      </div>
      <div>-</div>
      <div>
         <input type="" name="max" value="<?php echo e(request()->get('max')); ?>"  placeholder="tinggi">
      </div>
      <div>
        <button type="submit" value="sortir" >sortir</button>
      </div>
    <div>    
    </form>
  </li>
<ul>
</div>


<?php if( $produk->count() < 1): ?>
<div >
"Maaf produk yang anda cari belum tersedia" 
</div>
<?php else: ?>
<div class="grid-container">
	<?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<a target="_blank"  href="<?php echo e(url('amp/produk',$item->slug)); ?>" > 
	<?php if($item->foto_produk): ?>
	  <amp-img   src="<?php echo e(asset('gambar_produk/'.$item->foto_produk)); ?>"
    width="600"
    height="600"
    layout="responsive"
    alt="<?php echo e($item->nama); ?>"></amp-img>
	<?php else: ?>
		<amp-img  src="<?php echo e(asset('icon/NKJlogo.png')); ?>"
    width="600"
    height="600"
    layout="responsive"
    alt="<?php echo e($item->nama); ?>"></amp-img>
  <?php endif; ?>
  <div class="gradient"> <?php echo e($item->nama); ?> </div>
    <div class="lihat">
     <span class="fa fa-star checked"></span>
     <span class="fa fa-star checked"></span>
     <span class="fa fa-star checked"></span>
     <span class="fa fa-star checked"></span>
     <span class="fa fa-star checked"></span>
    </div>
	  <div  class="group inner list-group-item-heading harga"> < <?php echo e($item->disc); ?>% | <s class="disc">
	    <?php echo e('Rp'.' '. number_format($item->harga,2)); ?></s>  
	    <div>  <?php echo e('Rp'.' '. number_format( $item->harga - ($item->harga * $item->disc / 100) ,2)); ?>	</div>
	  </div>
	</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="page">
<?php echo $produk->links(); ?>

</div>
<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function(){ 	$("#urutkan").change(function(){ var urutkan= $('#urutkan option:selected').val();	window.location.href = "/produk/urutkan/barang?urutkan=" + urutkan;   }); });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/kategoriProduk_amp.blade.php ENDPATH**/ ?>