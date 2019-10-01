 
<?php $__env->startSection('content'); ?>

<div class="row justify-content-center halaman-konten"  > 
<div class="col-sm-12">


<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
       <div class="col-sm-6">
       <a href="<?php echo e(url('/nasabah/'.$identitas->id_enc.'/edit')); ?>">Ubah</a>
       </div>
       <div class="col-sm-6 text-right">
            Identitas <?php echo e($identitas->nama_lengkap); ?>

       </div>
      </div>
   </div>
<div class="card-body">

<table  id="tabelIdentitas" class="table">
<thead>
<tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
</tr>
</thead>	
<tbody>	
<tr>
      <td>Nama</td>
      <td></td>
      <td> <?php echo e($identitas->nama_lengkap); ?> </td>
</tr>
	
<tr>
      <td>Jenis kelamin</td>
      <td></td>
      <td> <?php echo e($identitas->nama_lengkap); ?> </td>
</tr>
<tr>
      <td>TTL</td>
      <td></td>
      <td> <?php echo e($identitas->tempat_lahir .'/'. $identitas->tanggal_lahir); ?> </td>
</tr>
<tr>
      <td>Alamat</td>
      <td></td>
      <td> <?php echo e($identitas->alamat .', Prov.'. $identitas->nama_provinsi_asal .', '. $identitas->nama_kabupaten_asal .', Kec.'. $identitas->nama_kecamatan_asal .', Kel.'. $identitas->nama_kelurahan_asal); ?> </td>
</tr>
<tr>
      <td>HP</td>
      <td></td>
      <td> <?php echo e($identitas->hp); ?> </td>
</tr>
<tr>
      <td>Telp</td>
      <td></td>
      <td> <?php echo e($identitas->telp); ?> </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Amp\resources\views/admin/identitas.blade.php ENDPATH**/ ?>