<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Layanan;
use App\Keuangan;
use App\Saldo;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function layanan(Request $request)
    {
        $tglCarbon = Carbon::createFromFormat("Y-m-d", $request->query('TanggalUpdate'));
        $kodeSatker = config('bios.kode_satker');

        $layanans = Layanan::leftJoin('fakultas', 'fakultas.id', '=', 'layanan.fakultas_id')
            ->leftJoin('jurusan', 'jurusan.id', '=', 'layanan.jurusan_id')
            ->leftJoin('prodi', 'prodi.id', '=', 'layanan.program_studi_id')
            ->leftJoin('akreditasi', 'akreditasi.id', '=', 'layanan.akreditasi_id')
            ->whereDate('layanan.updated_at', '>=', $tglCarbon->toDateString())
            ->select([
                'layanan.id as id',
                'layanan.tahun as tahun',
                'layanan.bulan as bulan',
                'fakultas.kode as fakultas',
                'jurusan.kode as jurusan',
                'prodi.kode as prodi',
                'akreditasi.kode as akreditasi',
                'layanan.updated_at'
            ])->get();

        $data = [];

        foreach ($layanans as $layanan) {
            $objLayanan = new \stdClass();
            $objLayanan->kode_satker = $kodeSatker;
            $objLayanan->tahun = $layanan->tahun;
            $objLayanan->bulan = $layanan->bulan;
            $objLayanan->kode_fakultas = $layanan->fakultas;
            $objLayanan->kode_program_studi = $layanan->prodi;
            $objLayanan->kode_akreditasi = $layanan->akreditasi;
            $objLayanan->kode_jurusan = $layanan->jurusan;
            $objLayanan->tanggal_update = Carbon::parse($layanan->tanggal_update)->format('Y/m/d H:m:s');

            $data [] = $objLayanan;
        }
        $response = [ 'layanan_pendidikan' => $data];

        return $response;
    }

    public function penerimaan(Request $request)
    {
        $tglCarbon = Carbon::createFromFormat("Y-m-d", $request->query('TanggalUpdate'));

        $akuns = Keuangan::leftJoin('kode_akun', 'kode_akun.id', '=', 'keuangan.kode_akun_id')
            ->where('keuangan.jenis', 1)
            ->whereDate('keuangan.updated_at', '>=', $tglCarbon->toDateString())
            ->select([
                'keuangan.tanggal as tanggal',
                'kode_akun.kode as kode_akun',
                'keuangan.saldo as saldo',
                'keuangan.updated_at as tanggal_update'
            ])->get();

        $data = [];

        foreach ($akuns as $akun) {
            $objLayanan = new \stdClass();
            $objLayanan->Tanggal = Carbon::parse($akun->tanggal)->format('Y-m-d H:m:s');
            $objLayanan->KodeAkun = $akun->kode_akun;
            $objLayanan->Saldo = $akun->saldo;
            $objLayanan->TanggalUpdate = Carbon::parse($akun->tanggal_update)->format('Y-m-d H:m:s');

            $data[] = $objLayanan;
        }

        $response = [];
        $response["Penerimaan"] = $data;

        return $response;
    }

    public function pengeluaran(Request $request)
    {
        $tglCarbon = Carbon::createFromFormat("Y-m-d", $request->query('TanggalUpdate'));

        $akuns = Keuangan::leftJoin('kode_akun', 'kode_akun.id', '=', 'keuangan.kode_akun_id')
            ->where('keuangan.jenis', 2)
            ->whereDate('keuangan.updated_at', '>=', $tglCarbon->toDateString())
            ->select([
                'keuangan.tanggal as tanggal',
                'kode_akun.kode as kode_akun',
                'keuangan.saldo as saldo',
                'keuangan.updated_at as tanggal_update'
            ])->get();

        $data = [];

        foreach ($akuns as $akun) {
            $objLayanan = new \stdClass();
            $objLayanan->Tanggal = Carbon::parse($akun->tanggal)->format('Y-m-d H:m:s');
            $objLayanan->KodeAkun = $akun->kode_akun;
            $objLayanan->Saldo = $akun->saldo;
            $objLayanan->TanggalUpdate = Carbon::parse($akun->tanggal_update)->format('Y-m-d H:m:s');

            $data[] = $objLayanan;
        }

        $response = [];
        $response["Pengeluaran"] = $data;

        return $response;
    }

    public function saldo(Request $request)
    {
        $tglCarbon = Carbon::createFromFormat("Y-m-d", $request->query('TanggalUpdate'));

        $akuns = Saldo::leftJoin('jenis_rekening', 'jenis_rekening.id', '=', 'saldo.jenis_rekening_id')
            ->whereDate('saldo.updated_at', '>=', $tglCarbon->toDateString())
            ->select([
                'saldo.tanggal as tanggal',
                'jenis_rekening.kode as kode_rekening',
                'saldo.nama_bank as nama_bank',
                'saldo.saldo as saldo',
                'saldo.updated_at as tanggal_update'
            ])->get();

        $data = [];

        foreach ($akuns as $akun) {
            $objLayanan = new \stdClass();
            $objLayanan->Tanggal = $akun->tanggal;
            $objLayanan->KodeJenisRekening = $akun->kode_rekening;
            $objLayanan->NamaBank = $akun->nama_bank;
            $objLayanan->Saldo = $akun->saldo;
            $objLayanan->TanggalUpdate = $akun->tanggal_update;

            $data [] = $objLayanan;
        }

        $response = [];
        $response["Saldo"] = $data;

        return $response;
    }
}
