<?php

namespace App\Http\Controllers;

use App\Akreditasi;
use App\Fakultas;
use App\Jurusan;
use App\Layanan;
use App\Prodi;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layanan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kodeSatker = config('value.kode_satker');
        $bulan = config('value.month_code');
        $fakultasRefs = Fakultas::all()->pluck('nama', 'id');
        $jurusanRefs = Jurusan::all()->pluck('nama', 'id');
        $prodiRefs = Prodi::all()->pluck('nama', 'id');
        $akreditasiRefs = Akreditasi::all()->pluck('nama', 'id');

        return view('layanan.create', compact(
            'kodeSatker',
            'bulan',
            'fakultasRefs',
            'jurusanRefs',
            'prodiRefs',
            'akreditasiRefs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $layanan = new Layanan();

        $layanan->kode_satker = config('value.kode_satker');
        $layanan->tahun = $request->input('tahun');
        $layanan->bulan = $request->input('bulan');
        $layanan->fakultas_id = $request->input('fakultas_id');
        $layanan->jurusan_id = $request->input('jurusan_id');
        $layanan->program_studi_id = $request->input('program_studi_id');
        $layanan->akreditasi_id = $request->input('akreditasi_id');

        $layanan->save();

        return redirect()->route('layanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        $layanan = Layanan::leftJoin('fakultas' , 'fakultas.id', '=', 'layanan.fakultas_id')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'layanan.jurusan_id')
            ->leftJoin('prodi', 'prodi.id', '=', 'layanan.program_studi_id')
            ->leftJoin('akreditasi',  'akreditasi.id', '=', 'layanan.akreditasi_id')
            ->select([
                'layanan.id as id',
                'layanan.tahun as tahun',
                'layanan.bulan as bulan',
                'fakultas.nama as fakultas',
                'jurusan.nama as jurusan',
                'prodi.nama as prodi',
                'akreditasi.nama as akreditasi',
                'layanan.created_at',
                'layanan.updated_at'])
            ->where('layanan.id', $layanan->id)
            ->first();
        return view('layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        $kodeSatker = config('value.kode_satker');
        $bulan = config('value.month_code');
        $fakultasRefs = Fakultas::all()->pluck('nama', 'id');
        $jurusanRefs = Jurusan::all()->pluck('nama', 'id');
        $prodiRefs = Prodi::all()->pluck('nama', 'id');
        $akreditasiRefs = Akreditasi::all()->pluck('nama', 'id');

        return view('layanan.edit', compact(
            'layanan',
            'kodeSatker',
            'bulan',
            'fakultasRefs',
            'jurusanRefs',
            'prodiRefs',
            'akreditasiRefs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        $layanan->tahun = $request->input('tahun');
        $layanan->bulan = $request->input('bulan');
        $layanan->fakultas_id = $request->input('fakultas_id');
        $layanan->jurusan_id = $request->input('jurusan_id');
        $layanan->program_studi_id = $request->input('program_studi_id');
        $layanan->akreditasi_id = $request->input('akreditasi_id');

        $layanan->save();

        return redirect()->route('layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        //
    }

    public function layananData()
    {
        $layanans = Layanan::leftJoin('fakultas' , 'fakultas.id', '=', 'layanan.fakultas_id')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'layanan.jurusan_id')
            ->leftJoin('prodi', 'prodi.id', '=', 'layanan.program_studi_id')
            ->leftJoin('akreditasi',  'akreditasi.id', '=', 'layanan.akreditasi_id')
            ->select([
                'layanan.id as id',
                'layanan.tahun as tahun',
                'layanan.bulan as bulan',
                'fakultas.nama as fakultas',
                'jurusan.nama as jurusan',
                'prodi.nama as prodi',
                'akreditasi.nama as akreditasi',
                'layanan.created_at',
                'layanan.updated_at'
            ]);

        return Datatables::of($layanans)
            ->addColumn('action', function ($layanan) {
                $buttonEdit = '<a href="'.route('layanan.edit', [$layanan->id]). '" class="btn"><i class="ti-pencil"></i> </a>';
                $buttonShow = '<a href="'.route('layanan.show', [$layanan->id]). '" class="btn"><i class="ti-eye"></i></a>';
                return $buttonEdit. " " .  $buttonShow;
            })
            ->make(true);
    }

}
