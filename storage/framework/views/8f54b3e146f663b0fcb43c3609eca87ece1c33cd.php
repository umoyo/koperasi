<?php $__env->startSection('canonical'); ?>
    <link rel="canonical" href="<?php echo e(url('/')); ?>" />
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('markup'); ?>

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "url": "<?php echo e(url('/')); ?>",  
  "name": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(strip_tags($tampil->nama)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "image": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(asset('icon/'.$tampil->logo)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
 "currenciesAccepted":"IDR",
  "address": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tampil->alamat); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "telephone": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tampil->telp); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "priceRange": "100 - 10.000.000",
  "logo": "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e(asset('icon/'.$tampil->logo)); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>",
  "paymentAccepted":"cash",
  "openingHours": "Mo-sa 8am-6pm",
  "@id": "https://www.nusakeatifjaya.com.com",
  "sameAs": 
    [
    "<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tampil->facebook); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"
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
    <?php $__env->stopSection(); ?>
    

<?php $__env->startSection('content'); ?>

<div class="paket">
    <div class="judulpaket">
        <h3>Peket Website sesuai kebutuhan anda</h3>
        <div>
        nusakreatifjaya merupakan layanan penyedia website guna membantu anda dalam mempublikasikan produk, jasa, perusahaan, dan lain sebagainanya agar lebih dikenal masyarakat.
        Kami menyediakan empat paket pilihan dan paket costume yang dapat anda desain sendiri kami yang akan membuatkan untuk anda.
        </div>
    </div>

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
</div>


<hr>
<div class="pilihkami"> 
    <div class="judulpaket">
    <h3>  Kenapa harus memilih kami? </h3>
    <div> 
        anda dalam memilih website mungkin memiliki kretieria yang sesuai dengan keinginan anda, berikut kenapa anda harus memilih nusakreatifjaya dalam membuat website anda.
    </div> 
    </div>
    <div>
      <?php $__currentLoopData = $tentangweb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($tw->kategori == "2"): ?>
      <div>
        <ul>
         <li>
          <?php echo e($tw->keterangan); ?>

         </li>
        </ul>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> 
</div> 
<hr>
<div class="ditanyakan">
    <div class="judulpaket">
    <h3> sering ditanyakan</h3>
    </div>
    <amp-accordion class="sample" animate expand-single-section>      
    <?php $__currentLoopData = $tentangweb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($tw->kategori == "1"): ?>
    <section>
      <h4><?php echo e($tw->nama); ?></h4>
      <p><?php echo e($tw->keterangan); ?></p>
    </section>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </amp-accordion>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('amp.layout_amp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/awal_amp.blade.php ENDPATH**/ ?>