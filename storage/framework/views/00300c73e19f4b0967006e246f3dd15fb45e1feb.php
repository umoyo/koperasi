<?php $__env->startSection('content'); ?>


<?php if(Session::get('alert-success')): ?>
     <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> data berhasil diganti.
  </div>    
  <?php endif; ?>

  
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
         $('#tabelSaldo').DataTable
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

<span id="pesan"></span>
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
       <div class="col-sm-6">
       </div>
       <div class="col-sm-6 text-right">
       <div class="text-right">Saldo total: Rp.<span class=" saldototal"><?php echo e(number_format( $identitas->dataSaldo->sum('saldo'),2)); ?></span></div>
       <input type="hidden" id="saldoinput" value="<?php echo e($identitas->dataSaldo->sum('saldo')); ?>">
       </div>
      </div>
   </div>
<div class="card-body">
<div class="table-responsive">

<table  id="tabelSaldo" class="table">
<thead>
<tr>
      <th>no</th>
      <th>bulan</th>
      <th>saldo min</th>
      <th>bunga</th>
      <th>detail</th>
</tr>
</thead>	
<tbody>	
<?php $__currentLoopData = $bulan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index =>$b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($b->bulan >= $identitas->created_at->format("Y-m")): ?>
 <tr>
 <td class="nomor"> <?php echo e($index +1); ?> </td>
 <td class="nomor"> <?php echo e($b->bulan); ?> </td>
 <td>  Rp. <?php echo e(number_format($identitas->dataSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->sum('saldo'),2)); ?></td>
 <td>  Rp. <?php echo e(number_format($identitas->dataSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->sum('saldo') / 100 * 0.5,2)); ?></td>
 <td><form method="post" id="bunga<?php echo e($b->id_enc); ?>" action="<?php echo e(url('/bunga')); ?>">
    <input type="hidden" name="id_enc" value="<?php echo e($identitas->id_enc); ?>">
    <input type="hidden" name="bunga" value=" <?php echo e($identitas->dataSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->sum('saldo') / 100 * 0.5); ?>">
    <?php echo csrf_field(); ?>
    <button form="bunga<?php echo e($b->id_enc); ?>" class="btn" type="submit" >Tambah Bunga</button>
    </form>
 </td>
 <!--
 <td>  <?php echo e($identitas->dataTotalSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->orderBy('saldo', 'asc')->min('saldo')); ?></td>
 <td>  <?php echo e($identitas->dataTotalSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->orderBy('saldo', 'asc')->min('saldo') / 100 * 0.5); ?></td>
 <td><form method="post" id="bunga<?php echo e($b->id_enc); ?>" action="<?php echo e(url('/bunga')); ?>">
    <input type="hidden" name="id_enc" value="<?php echo e($identitas->id_enc); ?>">
    <input type="hidden" name="bunga" value=" <?php echo e($identitas->dataTotalSaldo()->where('created_at','LIKE','%'.$b->bulan.'%')->orderBy('saldo', 'asc')->min('saldo') / 100 * 0.5); ?>">
    <?php echo csrf_field(); ?>
    <button form="bunga<?php echo e($b->id_enc); ?>" class="btn" type="submit" >Tambah Bunga</button>
    </form>
 </td>
 -->
 </tr>
 <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>
</table>
</div>
</div>
</div>


               
    <!-- Modal form to add a post -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>           
                <div class="modal-body">
                    <form class="form-horizontal" role="form"> 
                    <?php echo csrf_field(); ?>
                    <input type="text" class="form-control" id="id_enc" value="<?php echo e($identitas->id_enc); ?>">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nama">Aksi:</label>
                         <select type="text" class="form-control" id="aksi" autofocus>
                         <option value="ambil" >ambil</option>
                         <option value="tambah">tambah</option>
                         </select>
                    </div>   
                    
                     <div class="form-group">
                     <label class="control-label col-sm-2" for="dana">Dana:</label>
                     <div class="input-group mb-3">
                          <div class="input-group-prepend">
                           <span class="input-group-text">Rp.</span>
                          </div>
                          <input type="number" class="form-control" id="dana">
                          <div class="input-group-append">
                              <span class="input-group-text" >,00</span>
                          </div>
                     </div>
                     </div>

                    <div class="form-group">
                           <label class="control-label col-sm-2" for="deskripsi">Keterangan:</label>
                           <textarea class="form-control" id="keterangan" cols="40" rows="3"></textarea>
                    </div>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" id="saldoproses" class="btn btn-success tambah-data" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> simpan
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">
	$(document).ready(function(){

		$("#saldoproses").click(function(){
			var aksi = $('#aksi').val();
			var dana = $('#dana').val();
			var id_enc = $('#id_enc').val();
			var keterangan = $('#keterangan').val();
      		$.ajax({
            	type : 'POST',
           		url : window.location.origin + '/saldo',
            	data : 
				 {
					 '_token': $('input[name=_token]').val(), 
					 'aksi' : aksi,
					 'dana' : dana,
                'keterangan' : keterangan,
                'id_enc' : id_enc
				},

		 success: function (data)
		  {
           if(data.saldo < 1 )
           {
             $('#tabelSaldo').prepend("<tr ><td class='nomor'></td><td  ></td><td  >" + data.saldo + "</td><td>" + data.keterangan + "</td><td>" + data.created_at + "</td><td></td></tr>");                        
             var input = $('#saldoinput').val();
             $('.saldototal').html( parseInt(input) + parseInt(data.saldo) );
             $('#saldoinput').val(parseInt(input) + parseInt(data.saldo));
           }
           else
           {
             $('#tabelSaldo').prepend("<tr ><td class='nomor'></td><td  >" + data.saldo + "</td><td  ></td><td>" + data.keterangan + "</td><td>" + data.created_at + "</td><td></td></tr>");                        
             var input = $('#saldoinput').val();
             $('.saldototal').html( parseInt(input) + parseInt(data.saldo) );
             $('#saldoinput').val(parseInt(input) + parseInt(data.saldo));
           }

           $('.nomor').each(function (index) {    $(this).html(index+1);     });
           $('#pesan').html(data);
           },
				
		error: function (data)
		  {
			alert("gagal");
    	  }
     	});
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koperasi\resources\views/admin/bunga.blade.php ENDPATH**/ ?>