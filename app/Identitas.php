<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    
protected $table = 'identitas';
protected $primaryKey = 'id';
protected $fillable = ['nama_lengkap','alamat','jenis_kelamin','tempat_lahir','tanggal_lahir','provinsi_asal','kabupaten_asal','kecamatan_asal','kelurahan_asal','provinsi_dari','hp','telp','alamat_kirim','id_provinsi_kirim','id_kabupaten_kirim','nama_provinsi_kirim','nama_kabupaten_kirim'];

public function dataSaldo()
{
      return $this->hasMany('App\Saldo');
} 
public function dataTotalSaldo()
{
      return $this->hasMany('App\Total_saldo');
} 
}
