
<!doctype html>
<html ⚡>
<title>
    <?php echo $__env->yieldContent('title'); ?> <?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tm->nama); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</title>
<meta name="viewport" content="width=device-width,minimum-scale=1"/>
<link rel="shortcut icon" href="<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(asset('icon/'.$tm->icon)); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"/>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $__env->yieldContent('desc'); ?>"/>
<meta name="keywords" content="<?php echo $__env->yieldContent('key'); ?>"/>
<meta name="author" content="<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tm->nama); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>"/>
<?php echo csrf_field(); ?>
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!--
<script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
-->
<script  src="<?php echo e(asset('js/jquery-3.4.1.js')); ?>"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
<link href="<?php echo e(asset('fontawesome-free/css/all.css')); ?>" rel="stylesheet" type="text/css">
<script async custom-element="amp-accordion" src="<?php echo e(asset('js/amp/amp-accordion-0.1.js')); ?>"></script>
<script async custom-element="amp-carousel" src="<?php echo e(asset('js/amp/amp-carousel-0.1.js')); ?>"></script>
<script async custom-element="amp-fit-text" src="<?php echo e(asset('js/amp/amp-fit-text-0.1.js')); ?>"></script>
<script async custom-element="amp-selector" src="<?php echo e(asset('js/amp/amp-selector-0.1.js')); ?>"></script>
<script async custom-element="amp-bind" src="<?php echo e(asset('js/amp/amp-bind-0.1.js')); ?>"></script>
<script async src="<?php echo e(asset('js/amp/v0.js')); ?>"></script>
<script async custom-element="amp-sidebar" src="<?php echo e(asset('js/amp/amp-sidebar-0.1.js')); ?>"></script>
<script async custom-element="amp-form" src="<?php echo e(asset('js/amp/amp-form-0.1.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/amp.js')); ?>"  >  </script>

<style amp-boilerplate>
body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes  -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>
body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style>
</noscript>
<?php echo $__env->yieldContent('canonical'); ?>
<?php echo $__env->yieldContent('markup'); ?> 
<style amp-custom>
    @import  "<?php echo e(asset('css/amp.css')); ?>";
</style>
<body>

<div class="headerbar">
<ul >
   <li >
       <amp-img src="<?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e(asset('icon/'.$tm->logo)); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" class="logo" ></amp-img>
   </li>  
   <li >
      <div class="namaweb">
       <?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   <?php echo e($tam->nama); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </li>
   <li>
      <div class="search">
      <?php if(empty($Artikel)): ?>
      <form method="GET" action="<?php echo e(url('amp/cari')); ?>" target="_top">
      <input class="txt" type="text" name="produk" >
      </form>
      <?php else: ?>
      <form method="GET" action="<?php echo e(url('amp/cariartikel')); ?>" target="_top">
      <input class="txt" type="text" name="artikel" >
      </form> 
      <?php endif; ?>
      </div>
      </li>
    <li > 
         <div role="button" on="tap:sidebarShow.toggle" tabindex="0" class="hamburger">
             <a href="#" class="nav"> ☰</a>
         </div>
     </li>
</ul>   
</div>


<amp-sidebar id="sidebarShow" layout="nodisplay" side="right">
  <div role="button" aria-label="close sidebar" on="tap:sidebarShow.toggle" tabindex="0" class="close-sidebar"><a href="#">✕</a></div>
  <div class="sidebar">
    <div>
    <amp-accordion class="menuslide" animate expand-single-section>      
    <section>
        <h4>Produk</h4>
        <div> 
          <?php $__currentLoopData = App\kategoriKonten::where('tipe','produk')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <p>  <a href="<?php echo e(url('produk/kategori/'.$kat->slug)); ?>"> <?php echo e($kat->nama); ?>  </a>      </p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p><hr></p>
            <p><a href=" <?php echo e(url('artikel')); ?>">semua</a></p>
        </div>
    </section>
    <section>
        <h4>Artikel</h4>
        <div>
            <?php $__currentLoopData = App\kategoriKonten::where('tipe','artikel')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <p><a href=" <?php echo e(url('artikel/kategori/'.$kat->slug)); ?>"> <?php echo e($kat->nama); ?></a></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p><hr></p>
            <p><a href=" <?php echo e(url('artikel')); ?>">semua</a></p>
        </div>
    </section>
    <?php $__currentLoopData = App\Menu::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($kat->dataTipe->count() > 1 ): ?>
    <section>
       <h4><?php echo e($kat->nama); ?><h4>  
       <div>
            <?php $__currentLoopData = $kat->dataTipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><a class="dropdown-item" href="<?php echo e(url($kat->slug.'/'.$item->slug.'/lihat')); ?>" ><?php echo e($item->nama); ?> </a></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p><hr></p>
            <p><a href=" <?php echo e(url('artikel')); ?>"> Semua</a></p>
      </div>
    </section>
   <?php else: ?>
   <?php $__currentLoopData = $kat->dataTipe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section>
      <h4><a class="nav-link" href="<?php echo e(url('menu/'.$item->slug.'/lihat')); ?>"><?php echo e($kat->nama); ?></a><h4>  
        <p></p>
    </section>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</amp-accordion>
    </div> 
  </div>
  </div>
</amp-sidebar>


<button on="tap:sidebar-right.toggle"
    class="ampstart-btn caps m2 tombol">   
</button>


<div class="navbar">
  <a href="<?php echo e(URL::previous()); ?>">< </a>
  <a  href="<?php echo e(url('/')); ?>">Beranda</a>
  <?php if(Auth::guest()): ?>
  
  <div class="dropdown">
    <button class="dropbtn">masuk
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
        <div class="row">
        <div class="column">
        <a href="<?php echo e(url('login')); ?>"> Login </a>
        <hr>
        <a href="<?php echo e(url('register')); ?>"> Register </a>
        </div>
        </div>
    </div>
  </div> 
  <?php else: ?>
	    <a href="<?php echo e(route('logout')); ?>" onclick= "event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"> <?php echo e(csrf_field()); ?> </form>          
	    <a href="<?php echo e(url('pesanan')); ?>"> ( <?php echo e($user->pesanan->count()); ?> ) </a>
  <?php endif; ?>

  <a  href="<?php echo e(url('/paket')); ?>">Paket</a>

</div>

<amp-carousel class="carousel2"
  layout="responsive"
  height="160"
  width="300"
  type="slides"
  autoplay
  delay="2000">   
  <?php $__currentLoopData = App\Banner::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div>
    <amp-img src="<?php echo e(asset('banner/'.$item->nama)); ?>"
      layout="responsive" height="160" width="300"
      alt="<?php echo e($item->keterangan); ?>">
    </amp-img>
    <div class="caption">
    <?php echo e($item->keterangan); ?>

    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</amp-carousel>
<div class="isi">
    <?php echo $__env->yieldContent('content'); ?> 
</div>

    <?php $__currentLoopData = App\Tampilan::All(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tampil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="footer">   
  <div class="grid-container">
   <div>
    <div>Alamat :</div>
    <div><?php echo $tampil->alamat; ?></div>
    <hr>
    <div>Tentang kami:</div>
    <div><?php echo $tampil->tentang; ?></div>
   </div> 
   
   <div>
   <div>Kontak</div>
   <?php if($tampil->telp == !null): ?>
    <div>hp : <?php echo $tampil->telp; ?></div>
    <?php endif; ?>
    <?php if($tampil->wa == !null): ?>
    <div>wa : <?php echo $tampil->wa; ?></div>
    <?php endif; ?>
    <?php if($tampil->email == !null): ?>
    <div>email : <?php echo $tampil->email; ?></div>
    <?php endif; ?>
    </div>
   </div>

    <div class="sosial">
         <a class="fab fa-facebook-official " href="<?php echo $tampil->facebook; ?>"></a>  
         <a class="fab fa-instagram" href="<?php echo $tampil->facebook; ?>"></a>  
         <a class="fab fa-snapchat " href="<?php echo $tampil->snapchat; ?>"></a>  
         <a class="fab fa-pinterest-p" href="<?php echo $tampil->pinterest; ?>"></a>  
         <a class="fab fa-twitter " href="<?php echo $tampil->twitter; ?>"></a>  
         <a class="fab fa-linkedin" href="<?php echo $tampil->linkedin; ?>"></a>  
    </div>
    <div>
    Copyright &copy;  <a class="link"  href="<?php echo $tampil->link; ?>"><?php echo $tampil->copy_right; ?> <?php echo $tampil->tahun_copy_right; ?></a> 
    </div>
</div>


  <ul class="kontak">
     <?php if($tampil->wa == !null): ?>
    	<li class="wa">
    	<a  class="fa fa-whatsapp" href="<?php echo e('https://api.whatsapp.com/send?phone='.$tampil->wa.'&text= saya%20pesan%20'.url('amp/produk/')); ?>">Wa</a> 
    	</li>	
      <?php endif; ?>
       <?php if($tampil->telp == !null): ?>
    	<li class="telp">
    	    <a   class="fa fa-phone" href="<?php echo e('tel://'.$tampil->telp.'//'); ?>">Telp</a>  
    	</li>	
      <?php endif; ?>

     <?php if($tampil->sms == !null): ?>	
    	<li class="sms">
        	 <a  class="fa fa-send" href="<?php echo e('sms://'.$tampil->sms.'/?body=saya%20pesan%20'.url('amp/produk/')); ?>">sms</a>  
    	</li>
      <?php endif; ?>	
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



  </body>
</html>
<?php /**PATH C:\xampp\htdocs\blogfress\resources\views/amp/layout_amp.blade.php ENDPATH**/ ?>