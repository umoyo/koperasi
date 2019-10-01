<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Identitas;
use App\Saldo;
use App\Total_saldo;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\Bulan;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mail\EmailPesanan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class DataController extends Controller
{

    protected function getToken(){
        return hash('sha256', str_random(40));
    }

    public function index()
    {
        $identitas = Identitas::all();
        return view('admin.index',compact('identitas'));
    }

    
    public function show($id)
    {
        $identitas = Identitas::where('id_enc',$id)->first();
        return view('admin.identitas',compact('identitas'));
    }

    public function create()
    {
        $provinsi = Provinsi::orderBy("nama","asc")->pluck("nama","id");
        return view('admin.tambahidentitas',compact('provinsi'));
	}

    public function store (Request $request)
    {        

        request()->validate([
            'nama_lengkap' => 'required',
            'jenis_tabungan' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'provinsi_asal' => 'required',
            'kabupaten_asal' => 'required',
            'hp' => 'required',
        ],
        [
            'jenis_tabungan.required' => 'jenis tabungan belum diisi',
            'nama_lengkap.required' => 'nama lengkap belum diisi',
            'alamat.required' => 'alamat belum diisi',
            'jenis_kelamin.required' => 'jenis kelamin belum diisi',
            'tanggal_lahir.required' => 'tanggal lahir belum diisi',
            'tempat_lahir.required' => 'tempat lahir belum diisi',
            'provinsi_asal.required' => 'provinsi asal belum diisi',
            'kabupaten_asal.required' => 'kabupaten asal belum diisi',
            'hp.required' => ' hp belum diisi',
        ]);
        $identitas=new Identitas();

        $identitas->id_enc = $this->getToken();
        $identitas->jenis_tabungan = $request->jenis_tabungan;
        $identitas->nama_lengkap = $request->nama_lengkap;
        $identitas->alamat = $request->alamat;
        $identitas->jenis_kelamin = $request->jenis_kelamin;
        $identitas->tempat_lahir = $request->tempat_lahir;
        $identitas->tanggal_lahir = $request->tanggal_lahir;
        $identitas->provinsi_asal = $request->provinsi_asal;
        $identitas->kabupaten_asal = $request->kabupaten_asal;
        $identitas->kecamatan_asal = $request->kecamatan_asal;
        $identitas->kelurahan_asal = $request->kelurahan_asal;
        $identitas->hp = $request->hp;
        $identitas->telp = $request->telp;

        if(!empty($request->provinsi_asal))
        {
           $provinsi_asal = Provinsi::where('id',$request->provinsi_asal)->first();
           $identitas->nama_provinsi_asal =$provinsi_asal->nama;
        }

       if(!empty($request->kabupaten_asal))
       {
            $kabupaten_asal = Kabupaten::where('id',$request->kabupaten_asal)->first();
            $identitas->nama_kabupaten_asal =$kabupaten_asal->nama;
       }

       if(!empty($request->kecamatan_asal))
       {
           $kecamatan_asal = Kecamatan::where('id',$request->kecamatan_asal)->first();
           $identitas->nama_kecamatan_asal =$kecamatan_asal->nama;
       }

       if(!empty($request->kelurahan_asal))
       {
           $kelurahan_asal = Kelurahan::where('id',$request->kelurahan_asal)->first();
           $identitas->nama_kelurahan_asal =$kelurahan_asal->nama;
       }
       
       $identitas ->save();
       return redirect(url('/'))->with('berhasil', 'Data Berhasil Ditambah.');
 

    }


    public function edit($id)
    {
        $identitas=Identitas::where('id_enc',$id)->first();
        $provinsi = Provinsi::orderBy("nama","asc")->pluck("nama","id");
        return view('admin.gantiidentitas',compact('provinsi','identitas'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_tabungan' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'provinsi_asal' => 'required',
            'kabupaten_asal' => 'required',
            'hp' => 'required',
        ],
        [
            'nama_lengkap.required' => 'nama lengkap belum diisi',
            'alamat.required' => 'alamat belum diisi',
            'jenis_kelamin.required' => 'jenis kelamin belum diisi',
            'jenis_tabungan.required' => 'jenis tabungan belum diisi',
            'tanggal_lahir.required' => 'tanggal lahir belum diisi',
            'tempat_lahir.required' => 'tempat lahir belum diisi',
            'provinsi_asal.required' => 'provinsi asal belum diisi',
            'kabupaten_asal.required' => 'kabupaten asal belum diisi',
            'hp.required' => ' hp belum diisi',
        ]);

        $identitas = Identitas::where('id_enc',$id)->first();
        $identitas->nama_lengkap = $request->nama_lengkap;
        $identitas->jenis_tabungan = $request->jenis_tabungan;
        $identitas->alamat = $request->alamat;
        $identitas->jenis_kelamin = $request->jenis_kelamin;
        $identitas->tempat_lahir = $request->tempat_lahir;
        $identitas->tanggal_lahir = $request->tanggal_lahir;
        $identitas->provinsi_asal = $request->provinsi_asal;
        $identitas->kabupaten_asal = $request->kabupaten_asal;
        $identitas->kecamatan_asal = $request->kecamatan_asal;
        $identitas->kelurahan_asal = $request->kelurahan_asal;
        $identitas->hp = $request->hp;
        $identitas->telp = $request->telp;

        if(!empty($request->provinsi_asal))
        {
           $provinsi_asal = Provinsi::where('id',$request->provinsi_asal)->first();
           $identitas->nama_provinsi_asal =$provinsi_asal->nama;
        }

       if(!empty($request->kabupaten_asal))
       {
            $kabupaten_asal = Kabupaten::where('id',$request->kabupaten_asal)->first();
            $identitas->nama_kabupaten_asal =$kabupaten_asal->nama;
       }

       if(!empty($request->kecamatan_asal))
       {
           $kecamatan_asal = Kecamatan::where('id',$request->kecamatan_asal)->first();
           $identitas->nama_kecamatan_asal =$kecamatan_asal->nama;
       }

       if(!empty($request->kelurahan_asal))
       {
           $kelurahan_asal = Kelurahan::where('id',$request->kelurahan_asal)->first();
           $identitas->nama_kelurahan_asal =$kelurahan_asal->nama;
       }
       
       $identitas ->update();
       return redirect(url('/'))->with('berhasil', 'Data Berhasil Diganti.');
    }


    public function saldoIndex($id)
    {
        $identitas = Identitas::where('id_enc',$id)->first();
        return view('admin.saldo',compact('identitas'));
    }


    public function saldoStore(Request $request)
    {
        $saldo = new Saldo();
        $total_saldo = new Total_saldo();
        $identitas= Identitas::where('id_enc',$request->id_enc)->first();
        $saldototal = $identitas->dataSaldo->sum('saldo');
        $saldo->keterangan = $request->keterangan;
        $saldo->identitas_id =  $identitas->id;
        if ( $request->aksi == "ambil")
        {
            if($saldototal-$request->dana < 0 )
            {
                return response('saldo tidak cukup');            }
            else
            {
            $saldo->saldo   = "-".$request->dana;
            $total_saldo->saldo = $saldototal - $request->dana;
            $total_saldo->identitas_id = $identitas->id;
            $total_saldo->save();
            $saldo->save();
            return $saldo;
            }
        }
        else
        {
              $total_saldo->saldo = $saldototal + $request->dana;
              $total_saldo->identitas_id = $identitas->id;
              $total_saldo->save();
            $saldo->saldo = $request->dana;
            $saldo->save();
            return $saldo;
        }

    }

public function bungaShow($id)
{  
$bulan= Bulan::all();
$identitas= Identitas::where('id_enc',$id)->first();
$bulanan = Saldo::where('created_at','LIKE','%'.$bulan.'%')->count();
return view('admin.bunga',compact('bulan','identitas','bulanan'));

}

public function bungaStore(Request $request)
    {
        $identitas= Identitas::where('id_enc',$request->id_enc)->first();
        $bunga = new Saldo();
        $bunga->identitas_id =  $identitas->id;
        $bunga->saldo = $request->bunga;
        $bunga->keterangan =  "bunga tabungan";
        $bunga->save();
        return redirect(url('/'))->with('berhasil', 'Data Berhasil Ditambah.');
    }

public function provinsi()
    {
        $states = Provinsi::orderBy("nama","asc")->pluck("nama","id");
        return view('myform',compact('states'));
    }
    
public function kabupaten($id)
    {
        $kabupaten  = Kabupaten::orderBy("nama","asc")
                     ->orderBy("nama","asc")
                    ->where("provinsi_id",$id)
                    ->pluck("nama","id");
        return json_encode($kabupaten );
    }

public function kecamatan($id)
    {
        $kecamatan = Kecamatan::orderBy("nama","asc")
                    ->where("kabupaten_id",$id)
                    ->pluck("nama","id");
        return json_encode($kecamatan);
    }

public function kelurahan($id)
    {
        $kelurahan = Kelurahan::orderBy("nama","asc")
                    ->where("kecamatan_id",$id)
                    ->pluck("nama","id");
        return json_encode($kelurahan);
    }

 public function bulanStore (Request $request)
{
    $bulan = date('Y-m');
    $bulan2 = Bulan::where('bulan', $bulan) ->first();
    if(is_null($bulan2))
    {
        $bulan3= new Bulan();
        $bulan3->bulan=  $bulan;
        $bulan3->save();
        return $bulan3;
    }
    else
    {

    }
}


}
    