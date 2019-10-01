@extends('layouts.appAdmin')
 
@section('content')

<div class="row justify-content-center halaman-konten"  > 
<div class="col-sm-12">


<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
       <div class="col-sm-6">
       <a href="{{url('/nasabah/'.$identitas->id_enc.'/edit')}}">Ubah</a>
       </div>
       <div class="col-sm-6 text-right">
      {{$identitas->nama_lengkap .' Tab.'.$identitas->jenis_tabungan}}
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
      <td> {{$identitas->nama_lengkap }} </td>
</tr>
	
<tr>
      <td>Jenis kelamin</td>
      <td></td>
      <td> {{$identitas->jenis_kelamin }} </td>
</tr>
<tr>
      <td>TTL</td>
      <td></td>
      <td> {{$identitas->tempat_lahir .' / '. \Carbon\Carbon::parse($identitas->tanggal_lahir) ->format("d-m-Y") }} </td>
</tr>
<tr>
      <td>Alamat</td>
      <td></td>
      <td> {{$identitas->alamat .', Kel.'. $identitas->nama_kelurahan_asal .', Kec '. $identitas->nama_kecamatan_asal .', '. $identitas->nama_kabupaten_asal .', Prov.'. $identitas->nama_provinsi_asal  }} </td>
</tr>
<tr>
      <td>HP</td>
      <td></td>
      <td> {{$identitas->hp }} </td>
</tr>
<tr>
      <td>Telp</td>
      <td></td>
      <td> {{$identitas->telp }} </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection