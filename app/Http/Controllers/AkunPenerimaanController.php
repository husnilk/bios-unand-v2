<?php

namespace App\Http\Controllers;

use App\JenisAkun;
use App\Keuangan;
use Illuminate\Http\Request;

class AkunPenerimaanController extends Controller
{

    protected $jenis = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemPerPage = config('bios.item_per_page');
        $akuns = Keuangan::where('jenis', $this->jenis)->paginate($itemPerPage);
        $kodeAkunRef = JenisAkun::where('jenis', $this->jenis)->pluck('uraian', 'id');
        $jenisAkun = config('bios.jenis_akun');
        $jenis = $this->jenis;

        return view('keuangan.penerimaan.index', compact(
            'jenis',
            'akuns',
            'kodeAkunRef',
            'jenisAkun'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemPerPage = config('bios.item_per_page');
        $akuns = Keuangan::where('jenis', $this->jenis)->paginate($itemPerPage);
        $kodeAkunRef = JenisAkun::where('jenis', $this->jenis)->pluck('uraian', 'id');
        $jenisAkun = config('bios.jenis_akun');
        $jenis = $this->jenis;

        return view('keuangan.penerimaan.create', compact(
            'jenis',
            'akuns',
            'kodeAkunRef',
            'jenisAkun'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $akunPenerimaan = new Keuangan();
        $akunPenerimaan->jenis = $this->jenis;
        $akunPenerimaan->tanggal = $request->input('tanggal');
        $akunPenerimaan->kode_akun_id = $request->input('kode_akun_id');
        $akunPenerimaan->saldo = $request->input('saldo');
        $akunPenerimaan->status = 0;
        $akunPenerimaan->save();

        return redirect()->route('penerimaan.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = Keuangan::find($id);
        $kodeAkunRef = JenisAkun::where('jenis', $this->jenis)->pluck('uraian', 'id');
        $jenisAkun = config('bios.jenis_akun');
        $jenis = $this->jenis;

        return view('keuangan.penerimaan.edit', compact(
            'akun',
            'kodeAkunRef',
            'jenisAkun',
            'jenis'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $akunPenerimaan = Keuangan::find($id);

        $akunPenerimaan->jenis = $this->jenis;
        $akunPenerimaan->tanggal = $request->input('tanggal');
        $akunPenerimaan->kode_akun_id = $request->input('kode_akun_id');
        $akunPenerimaan->saldo = $request->input('saldo');
        $akunPenerimaan->status = 0;
        $akunPenerimaan->save();

        return redirect()->route('penerimaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $datas =  $request->input('itemDelete');
        foreach ($datas as $id => $data)
        {
            Keuangan::find($id)->delete();
        }

        return redirect()->route('penerimaan.index');
    }
}
