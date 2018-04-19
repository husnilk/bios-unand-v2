<?php

namespace App\Http\Controllers;

use App\JenisRekening;
use App\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saldos = Saldo::paginate(25);
        $jenisRekRef =  JenisRekening::all()->pluck('uraian', 'id');

        return view('keuangan.saldo.index', compact(
            'saldos',
            'jenisRekRef'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $saldos = Saldo::paginate(25);
        $jenisRekRef =  JenisRekening::all()->pluck('uraian', 'id');

        return view('keuangan.saldo.create', compact(
            'saldos',
            'jenisRekRef'
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
        $saldo = new Saldo();
        $saldo->tanggal = $request->input('tanggal');
        $saldo->jenis_rekening_id = $request->input('jenis_rekening_id');
        $saldo->nama_bank = $request->input('nama_bank');
        $saldo->saldo = $request->input('saldo');
        $saldo->save();

        return redirect()->route('saldo.create');
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
        $saldo = Saldo::find($id);
        $jenisRekRef =  JenisRekening::all()->pluck('uraian', 'id');

        return view('keuangan.saldo.edit', compact(
            'saldo',
            'jenisRekRef'
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
        $saldo = Saldo::find($id);
        $saldo->jenis_rekening_id = $request->input('jenis_rekening_id');
        $saldo->tanggal = $request->input('tanggal');
        $saldo->saldo = $request->input('saldo');
        $saldo->nama_bank = $request->input('nama_bank');

        $saldo->save();

        return redirect()->route('saldo.index');
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
            Saldo::find($id)->delete();
        }

        return redirect()->route('saldo.index');
    }
}
