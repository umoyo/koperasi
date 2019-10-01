<?php $__env->startSection('title',  $produk->nama.' - '.$produk->kategori .' - ' ); ?>
<?php $__env->startSection('key', $produk->kategori .'-' ); ?>
<?php $__env->startSection('desc', 'jual '. strip_tags($produk->nama) .' murah. '. \Illuminate\Support\Str::words(strip_tags($produk->deskripsi), 160,'') ); ?>

    <?php $__env->startSection('canonical'); ?>
<link rel="canonical" href="<?php echo e(url('amp/produk/'.$produk->slug)); ?>" />
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('markup'); ?>

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "url": "<?php echo e(url('/')); ?>",  
  "name": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(strip_tags($tam->nama)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "image": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(asset('icon/'.$tm->logo)); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
 "currenciesAccepted":"IDR",
  "address": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tampil->alamat); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "telephone": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tampil->telp); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "priceRange": "100 - 10.000.000",
  "logo": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(asset('icon/'.$tm->logo)); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "paymentAccepted":"cash",
  "openingHours": "Mo-sa 8am-6pm",
  "@id": "https://www.nusakeatifjaya.com.com/produk",
  "sameAs": 
    [
    "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tampil->facebook); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
    ],
  "potentialAction": 
    [
        {
        "@type": "SearchAction",
        "target": "https://www.nusakreatifjaya.com/cari?produk={search_term_string}",
        "query-input": "required name=search_term_string"
         }
    ]
}
</script>

<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(strip_tags($tam->nama)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "image": [
      <?php $__currentLoopData = $produk->fotoproduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      "<?php echo e(asset('gambar_produk/'.$c->foto)); ?>",
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    "<?php echo e(asset('gambar_produk/'.$produk->foto_produk)); ?>"
   ],
  "description": "<?php echo e(strip_tags($produk->deskripsi)); ?>",
  "mpn": "925872",
  <?php if(!empty($produk->merk)): ?>
  "brand": {
    "@type": "Thing",
    "name": "<?php echo e($produk->merk); ?>"
  },
  <?php endif; ?>
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.9",
    "reviewCount": "90"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "IDR",
    "price": "<?php echo e($produk->harga - ($produk->harga * $produk->disc / 100)); ?>"
    }
  }
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
      "@id": "#",
      "name": "Amp"
    }
  },{
    "@type": "ListItem",
    "position": 3,
    "item": {
      "@id": "<?php echo e(url('/produk')); ?>",
      "name": "Produk"
    }
  },{
    "@type": "ListItem",
    "position": 4,
    "item": {
      "@id": "<?php echo e(url('amp/produk/'.$produk->slug)); ?>",
      "name": "<?php echo e($produk->nama); ?>",
      "image": "<?php echo e(asset('gambar_produk/'.$produk->foto_produk)); ?>"
    }
  }
  ]
}
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<p>
<ol class="breadcrumb">
  <li class="um"><a href="<?php echo e(url('/')); ?>">Home</a></li>
  <li class="um"><a href="<?php echo e(url('/')); ?>">Amp</a></li>
  <li class="um"><a href="<?php echo e(url('produk')); ?>">Produk</a></li>
  <li class="um"><a href="<?php echo e(url('/amp/produk/'. $produk->slug)); ?>"><?php echo substr($produk->nama,0,10); ?>...</a></li>
</ol>
</p>



  <div class="artikeltampil " > <?php echo e($produk-> nama); ?></div>
	 	<div class="admin" > 
		<span class="fa fa-user"></span> <?php echo e($produk->admin); ?> | 
		<span class="fa fa-calendar"></span> <?php echo e($produk->created_at); ?> | 
		<span class="fa fa-bookmark"></span> <?php echo e($produk->kategori); ?>

	  </div>

<amp-carousel width="300" 
  height="300"
  layout="responsive"
  type="slides"
  autoplay
  delay="3000">
  <amp-img  class="green-box" src="<?php echo e(asset('gambar_produk/'.$produk->foto_produk)); ?>"
    width="600"
    height="300"
    layout="responsive"
    alt="a sample image"></amp-img>
        <?php $__currentLoopData = $produk->fotoproduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <amp-img  class="green-box" src="<?php echo e(asset('gambar_produk/'.$c->foto)); ?>"
    width="600"
    height="300"
    layout="responsive"
    alt="a sample image"></amp-img>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</amp-carousel>


<div class="page">
<ul >
<li class="previous">
  <div>
     <form  role="form">
     <input type="hidden" id="nama_add" value ="<?php echo e($produk->nama); ?>" autofocus>
     <input type="hidden" id="foto_produk_add" value ="<?php echo e($produk->foto_produk); ?>"autofocus>
     <input type="hidden" id="harga_add" value ="<?php echo e($produk->harga); ?>" autofocus>
     <input type="hidden" id="produk_id_add" value ="<?php echo e($produk->id); ?>" autofocus>
     <input type="hidden" id="kode_add" value ="<?php echo e(rand(10000,99999)); ?>" autofocus>
     <input type="hidden" id="berat_add" value ="<?php echo e($produk->berat); ?>"autofocus>
     <input type="hidden" id="jumlah_add" value ="1" autofocus>                  
     </form>
	   <?php if($produk->stok > "0"): ?>
       <button type="button" class="button add" data-dismiss="modal">Beli
     <?php else: ?>
       <button type="button" class="button3 add" data-dismiss="modal">Kosong</button>
     <?php endif; ?>
      </div>
    </li>
    <li class="next">
    <a href="<?php echo e(url('/produk/'.$produk->slug)); ?>" class="dropbtn button2">Detail</a>
    </li>
    </ul>
</div>

<div class="kotak">
  <div><strong>Harga</strong></div>
	<div  class=" harga"> < <?php echo e($produk->disc); ?>% | <s class="disc">
	<?php echo e('Rp'.' '. number_format($produk->harga,2)); ?></s>  <?php echo e('Rp'.' '. number_format( $produk->harga - ($produk->harga * $produk->disc / 100) ,2)); ?>

	</div>	
    <div class="lihat">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
</div>

<div class="kotak" >
	<div><strong>Deskripsi</strong>
	</div>
	<div class="text"><?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $produk->deskripsi); ?> </div>
</div>

<div class="kotak">
	<div ><strong>Spesifikasi</strong></div>
	<div class="text">	<?php echo preg_replace('/(<[^>]+) style=".*?"/i', '$1', $produk->fiture); ?> </div>
</div>


<dIv class="kotak">
    
	<div ><strong>Bagikan</strong></div>
<a href="<?php echo e('http://www.facebook.com/sharer.php?u='. url('produk/'.$produk->slug)); ?>" class="fab fa-facebook media sosial-facebook"></a>
<a href="<?php echo e('https://twitter.com/share?url='.url('produk/'.$produk->slug).'&text=Simple%20Share%20Buttons&hashtags=simplesharebuttons'); ?>" class="fab fa-twitter  media sosial-twitter"></a>
<a href="<?php echo e('https://plus.google.com/share?url='.url('produk/'.$produk->slug)); ?>" class="fab fa-google media sosial-google"></a>
<a href="<?php echo e('whatsapp://send?text='.url('produk/'.$produk->slug)); ?>" data-action="share/whatsapp/share" class="fab fa-whatsapp media sosial-wa"> </a>

</div>
  <div class="page">
	<ul >
		<li class="previous "> <a href="<?php echo e(url( 'amp/produk', $previous)); ?>"><i class="fa fa-angle-left"></i> Sesudah</a> </li>
		<li class="next" > <a href="<?php echo e(url( 'amp/produk', $next  )); ?>">Sebelum <i class="fa fa-angle-right"></i></a> </li>
  </ul>
</div>

<div class="text2">Produk Terkait</div>
<div>
    <amp-carousel class="carousel-preview" width="auto" height="70" layout="fixed-height" type="carousel">
  		<?php $__currentLoopData = app\produk::where('kategorikonten_id', $produk->kategorikonten_id )->orderByraw('rand()')->limit(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <button on="" type="button">
          <a href="<?php echo e(url('amp/produk/'.$item->slug)); ?>">
          <amp-img src="<?php echo e(asset('gambar_produk/'.$item->foto_produk)); ?>"
          width="80" height="60" layout="responsive" alt="<?php echo e($item->nama); ?>" title="<?php echo e($item->slug); ?>">
        </amp-img>
          </a>
    </button>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </amp-carousel>
  </div>

 
<script type="text/javascript">
$('.modal-footer').on('click', '.add', function() 
{
   $.ajax(
	{
  type: 'POST',
  url: '<?php echo e(url('amp/produk')); ?>',
  data: 
		{
       "_token": "<?php echo e(csrf_token()); ?>",
      'jumlah': $('#jumlah_add').val(),
      'harga': $('#harga_add').val(),
       'nama': $('#nama_add').val(),
      'produk_id': $('#produk_id_add').val(),
      'berat': $('#berat_add').val(),
      'kode': $('#kode_add').val(),
      'foto_produk': $('#foto_produk_add').val()
    },
                success: function(data) 
		{
    }
   });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/kontenProduk_amp.blade.php ENDPATH**/ ?>