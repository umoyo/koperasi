<?php $__env->startSection('content'); ?>


<?php if(Session::get('alert-success')): ?>
     <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> data berhasil diganti.
  </div>    
  <?php endif; ?>

  
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
         $('#tabelIdentitas').DataTable
         ({
             "language": {
                         "decimal":        "",
                         "emptyTable":     "tidak ada data pada tabel",
                         "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ halaman",
                         "infoEmpty":      "Menampilkan 0 to 0 of 0 entries",
                         "infoFiltered":   "(filtered from _MAX_ total entries)",
                         "infoPostFix":    "",
                         "thousands":      ",",
                         "lengthMenu":     "Menampilkan _MENU_ ",
                         "loadingRecords": "Memuat...",
                         "processing":     "Sedang diproses...",
                         "search":         "Cari data:",
                         "zeroRecords":    "Data tidak ditemukan",
                         "paginate": {
                                      "first":      "Awal",
                                      "last":       "Akhir",
                                      "next":       "Selanjutnya",
                                      "previous":   "Sebelumnya"
                                     },
                         "aria":     {
                                      "sortAscending":  ": activate to sort column ascending",
                                       "sortDescending": ": activate to sort column descending"
                                     }
                         }
         });
});
</script>

<?php if(session('berhasil')): ?>
      <div class="alert alert-success" role="alert">
          <?php echo e(session('berhasil')); ?>

      </div>
<?php elseif(session('gagal')): ?>
<div class="alert alert-danger" role="alert">
    <?php echo e(session('gagal')); ?>

</div>
<?php endif; ?>
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
       <div class="col-sm-6">
       </div>
       <div class="col-sm-6 text-right">
         
       </div>
      </div>
   </div>
<div class="card-body">
<div class="table-responsive">

<table  id="tabelIdentitas" class="table">
<thead>
<tr>
      <th>no</th>
      <th>nama</th>
      <th>saldo</th>
      <th>detail</th>
</tr>
</thead>	
<tbody>	
<?php $__currentLoopData = $identitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td> <?php echo e($index +1); ?> </td>
<td>  <?php echo e($b->nama_lengkap); ?> </td>
<td>  Rp. <?php echo e(number_format( $b->dataSaldo->sum('saldo'),2)); ?></td>
<td>  <a href="<?php echo e(url('/nasabah/'.$b->id_enc)); ?>" >identitas</a> | <a href="<?php echo e(url('/saldo/'.$b->id_enc)); ?>" >dana</a> </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
</div>
</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Amp\resources\views/admin/index.blade.php ENDPATH**/ ?>