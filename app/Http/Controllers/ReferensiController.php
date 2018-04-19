<?php

namespace App\Http\Controllers;

use App\Akreditasi;
use App\Fakultas;
use App\JenisAkun;
use App\JenisRekening;
use App\Jurusan;
use App\Kelas;
use App\Prodi;
use Yajra\Datatables\Datatables;

class ReferensiController extends Controller
{
    public function showFakultas()
    {
        return view('referensi.fakultas');
    }

    public function fakultasData()
    {
        return Datatables::of(Fakultas::query())->make(true);
    }

    public function getFakultas()
    {
        $url = config('bios.ref_url')['fakultas'];
        $this->_populateReference(Fakultas::class, $url, 'kode_fakultas', 'nama_fakultas');
        return redirect()->route('ref.fakultas');
    }

    public function showJurusan()
    {
        return view('referensi.jurusan');
    }

    public function jurusanData()
    {
        return Datatables::of(Jurusan::query())->make(true);
    }

    public function getJurusan()
    {
        $url = config('bios.ref_url')['jurusan'];
        $this->_populateReference(Jurusan::class, $url, 'kode_jurusan', 'nama_jurusan');
        return redirect()->route('ref.jurusan');
    }

    public function showProdi()
    {
        return view('referensi.prodi');
    }

    public function prodiData()
    {
        return Datatables::of(Prodi::query())->make(true);
    }

    public function getProdi()
    {
        $url = config('bios.ref_url')['prodi'];
        $this->_populateReference(Prodi::class, $url, 'kode_program', 'nama_program');
        return redirect()->route('ref.prodi');
    }

    public function showKelas()
    {
        return view('referensi.kelas');
    }

    public function kelasData()
    {
        return Datatables::of(Kelas::query())->make(true);
    }

    public function getKelas()
    {
        $url = config('bios.ref_url')['kelas'];
        $this->_populateReference(Kelas::class, $url, 'kode_kelas', 'nama_kelas');
        return redirect()->route('ref.kelas');
    }

    public function showAkreditasi()
    {
        return view('referensi.akreditasi');
    }

    public function akreditasiData()
    {
        return Datatables::of(Akreditasi::query())->make(true);
    }

    public function getAkreditasi()
    {
        $url = config('bios.ref_url')['akreditasi'];
        $this->_populateReference(Akreditasi::class, $url, 'kode_akreditasi', 'nama_akreditasi');
        return redirect()->route('ref.akreditasi');
    }

    public function showJenisAkun()
    {
        return view('referensi.jenisakun');
    }

    public function jenisAkunData()
    {
        return Datatables::of(JenisAkun::query())->make(true);
    }

    public function getJenisAkun()
    {
        $this->_populateAkun(1);
        $this->_populateAkun(2);
        return redirect()->route('ref.jenisakun');
    }

    public function showJenisRekening()
    {
        return view('referensi.jenisrekening');
    }

    public function jenisRekeningData()
    {
        return Datatables::of(JenisRekening::query())->make(true);
    }

    public function getJenisRekening()
    {
        $url = config('bios.ref_url')['jenisrekening'];
        $req = file_get_contents($url);
        $refJenisReks = json_decode(trim($req));
        $allJenisRekening = JenisRekening::all();

        foreach ($refJenisReks as $refJenisRek)
        {
            $jenisRek = $allJenisRekening->where('kode', $refJenisRek->Kode)->first();
            if($jenisRek != null)
            {
                //update
                $jenisRek->uraian = $refJenisRek->Uraian;
                $jenisRek->save();
            }else{
                //insert
                $jenisRek = new JenisRekening();
                $jenisRek->kode = $refJenisRek->Kode;
                $jenisRek->uraian = $refJenisRek->Uraian;
                $jenisRek->save();
            }
        }
        return redirect()->route('ref.jenisrekening');
    }

    protected function _populateAkun($type = 1)
    {
        if($type == 1)
        {
            $url = config('bios.ref_url')['akunpenerimaan'];
        }else{
            $url = config('bios.ref_url')['akunpengeluaran'];
        }

        $req = file_get_contents($url);
        $refAkuns = json_decode(trim($req));
        $allAkun = JenisAkun::all();

        foreach ($refAkuns as $refAkun)
        {
            $akun = $allAkun->where('kode', $refAkun->Kode)->first();
            if($akun != null)
            {
                //update
                $akun->uraian = $refAkun->Uraian;
                $akun->save();
            }else{
                //insert
                $akun = new JenisAkun();
                $akun->jenis = $type;
                $akun->kode = $refAkun->Kode;
                $akun->uraian = $refAkun->Uraian;
                $akun->save();
            }
        }
    }

    protected function _populateReference($classname, $url, $kode, $nama)
    {
        $req = file_get_contents($url);
        $req = json_decode(trim($req));

        $refItems = [];
        foreach ($req as $var => $refItems){} //get value of object's property
        $allItems = $classname::all();

        foreach ($refItems as $refItem)
        {
            $item = $allItems->where('kode', $refItem->$kode)->first();
            if($item != null)
            {
                //update
                $item->nama = $refItem->$nama;
                $item->save();
            }else{
                //insert
                $item = new $classname();
                $item->kode = $refItem->$kode;
                $item->nama = $refItem->$nama;
                $item->save();
            }
        }
    }
}
