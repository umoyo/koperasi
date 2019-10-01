@extends('layouts.appAdmin')
@section('content')


@if (Session::get('alert-success'))
     <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> data berhasil diganti.
  </div>    
  @endif

  
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

@if (session('berhasil'))
      <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
      </div>
@elseif (session('gagal'))
<div class="alert alert-danger" role="alert">
    {{ session('gagal') }}
</div>
@endif
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
       <div class="col-sm-6">
       <a href="{{url('nasabah/create')}}">tambah nasabah</a>
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
<!--      <th>(6%) / thn</th>-->
      <th>Terdaftar</th>
      <th>detail</th>
</tr>
</thead>	
<tbody>	
@foreach($identitas as $index =>$b)
<tr>
<td> {{$index +1}} </td>
<td>  {{$b->nama_lengkap}} </td>
<td>  Rp. {{number_format( $b->dataSaldo->sum('saldo'),2)}}</td>
<!--<td>  Rp. {{number_format( $b->dataSaldo->sum('saldo') /100*6 ,2)}}</td>-->
<td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $b->created_at)->diffForHumans() .' / '.$b->created_at->format('d-M-Y') }}</td>
<td>  
  <a href="{{url('/nasabah/'.$b->id_enc)}}" >identitas</a> | <a href="{{url('/saldo/'.$b->id_enc)}}" >dana</a> | <a href="{{url('/bunga/'.$b->id_enc)}}" >rincian bunga</a> 
</td>
</tr>
@endforeach

</tbody>
</table>
</div>
</div>
</div>    
<!-- Modal form to add a post -->
 <div id="tambahBunga" class="modal fade" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
         <form method="post" action="{{url('bunga')}}" id="formbunga">
         @csrf
         </form>        
         <button type="submit" class="btn btn-primary" form="formbunga" > Masukan bunga </button>
         <button type="button" class="btn btn-warning" data-dismiss="modal">Batal  </button>
        </div>
    </div>
  </div>

@endsection
