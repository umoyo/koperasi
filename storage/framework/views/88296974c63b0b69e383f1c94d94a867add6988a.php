<?php $__env->startSection('content'); ?>



<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="container-fluid halaman-konten">
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            Identitas
        </div>
      </div>
   </div>
<div class="card-body">
    <div id="notifications"></div>  
    <?php echo Form::open(['url' => 'nasabah/','files' => 'true','enctype'=>'multipart/form-data']); ?>

    <?php echo csrf_field(); ?>
    <div class="form-group" >
    <?php echo Form::label( 'jenis_tabungan', 'Jenis Tabungan:'); ?>

    <?php echo e(Form::select ('jenis_tabungan', ['sekarela' => 'sukarela', 'bambu' => 'bambu', 'tanah_liat' => 'tanah liat'], null , ['id'=>'jenis_kelamin','class'=>'form-control form-control-sm'])); ?>

    </div>


    <input type="hidden" name="method" value="put" id="method" >
    <div class="form-group" >
    <?php echo Form::label('nama', 'Nama Lengkap:'); ?>

    <?php echo Form::text('nama_lengkap',null,['class'=>'form-control form-control-sm','id'=>'nama_lengkap', 'maxlength'=>500  ]); ?> <div style="font-size:8pt;margin-left:5px">max 500</div>
    </div>

    <div class="form-group" >
    <?php echo Form::label( 'jenis_kelamin', 'Jenis Kelamin:'); ?>

    <?php echo e(Form::select ('jenis_kelamin', ['','laki-laki' => 'laki-laki', 'perempuan' => 'perempuan'], null , ['id'=>'jenis_kelamin','class'=>'form-control form-control-sm'])); ?>

    </div>

        <div class="row">
        <div class="col-sm-4" >
            <?php echo Form::label('tempat_lahir', 'Tempat:'); ?>

            <?php echo Form::text('tempat_lahir',null,['id'=>'tempat_lahir','class'=>'form-control form-control-sm','maxlength'=>18]); ?>

            <div style="font-size:8pt;margin-left:5px">max 30</div>
        </div>

        <div class="col-sm-8" >
            <?php echo Form::label('tanggal_lahir', 'Tanggal Lahir (HH/BB/TTTT) :'); ?>

            <div class="input-group input-append date" >
                <input type="date" id="tanggal_lahir" value="" name="tanggal_lahir" min="1000-01-01"   max="3000-12-31" class="form-control form-control-sm">
                <span class="input-group-addon add-on">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
        </div>

    <div class="form-group" style="margin-top:10px" >
    <?php echo Form::label('alamat', 'Alamat lengkap:'); ?>

    <?php echo Form::textarea('alamat',null,['id'=>'alamat','class'=>'form-control form-control-sm','maxlength'=>500]); ?>

        <div style="font-size:8pt;margin-left:5px">max 500</div>
    </div>

    <div class="row">
        <div class="col-sm-3 form-group" >
        <?php echo Form::label('provinsi', 'Provinsi:'); ?>

        <select name="provinsi_asal" id="provinsi_asal" value="" class="form-control form-control-sm" >
            <option value="">--pilih--</option>
            <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>

        <div class="col-sm-3 form-group" >
        <?php echo Form::label('kabupaten', 'Kab / Kota:'); ?>

        <?php echo e(Form::select ('kabupaten_asal', [null], null , ['id'=>'kabupaten_asal','class'=>'form-control form-control-sm'])); ?>

        </div>

        <div class="col-sm-3 form-group" >
        <?php echo Form::label('kecamatan', 'Kecamatan:'); ?>

        <?php echo e(Form::select ('kecamatan_asal', [null], null , ['id'=>'kecamatan_asal','class'=>'form-control form-control-sm'])); ?>

        </div>

        <div class="col-sm-3 form-group" >
        <?php echo Form::label('kelurahan', 'Kelurahan:'); ?>

        <?php echo e(Form::select ('kelurahan_asal', [null], null , ['id'=>'kelurahan_asal','class'=>'form-control form-control-sm'])); ?>

        </div>
    </div>

    <div class="form-group" id="telp">
    <?php echo Form::label('telp', 'No. telpon Rumah:'); ?>

    <?php echo Form::text('telp',null,['class'=>'form-control form-control-sm','id'=>'telephone', 'maxlength'=>50  ]); ?> 
        <div style="font-size:8pt;margin-left:5px">max 15</div>
    </div>

    <div class="form-group" id="hp">
    <?php echo Form::label('hp', 'No. hp:'); ?>

    <?php echo Form::text('hp',null,['class'=>'form-control form-control-sm','id'=>'handphone', 'maxlength'=>50  ]); ?> 
        <div style="font-size:8pt;margin-left:5px">max 15</div>
    </div>


    <?php echo Form::submit('Tambah', ['class' => 'btn btn-primary']); ?>


    <?php echo Form::close(); ?>

    </div>

</div>
</div>





<!-- KOTA alamat -->


<script type="text/javascript">
    $(document).ready(function() {
       
 $('select[name="provinsi_asal"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: window.location.origin + '/identitas/kabupaten/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="kabupaten_asal"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kabupaten_asal"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kabupaten_asal" disable]').empty();

            }
        });

    });
</script>


<!-- KOTA ALAMAT -->

<script type="text/javascript">
    $(document).ready(function() {
       
 $('select[name="kabupaten_asal"]').on('change', function() {
            var state2ID = $(this).val();
            if(state2ID) {
                $.ajax({
                    url: window.location.origin + '/identitas/kecamatan/'+state2ID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {       
                        $('select[name="kecamatan_asal"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kecamatan_asal"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kecamatan_asal" disable]').empty();
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
       
 $('select[name="kecamatan_asal"]').on('change', function() {
            var state3ID = $(this).val();
            if(state3ID) {
                $.ajax({
                    url: window.location.origin + '/identitas/kelurahan/'+state3ID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {               
                        $('select[name="kelurahan_asal"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="kelurahan_asal"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    }
                });
            }else{
                $('select[name="kelurahan_asal"]').empty();
            }
        });

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\koperasi\resources\views/admin/tambahidentitas.blade.php ENDPATH**/ ?>