<?php

return [
    'kode_satker' => 12231,
    'item_per_page' => 25,
    'jenis_akun' => [
        1 => 'Penerimaan',
        2 => 'Pengeluaran',
    ],
    'status_user' => [
        0 => 'Tidak Aktif',
        1 => 'Aktif'
    ],
    'ref_url' => [
        'fakultas' => 'http://bios.djpbn.kemenkeu.go.id/web_services/ref_fakultas',
        'jurusan' => 'http://bios.djpbn.kemenkeu.go.id/web_services/ref_jurusan',
        'prodi' => 'http://bios.djpbn.kemenkeu.go.id/web_services/ref_program_studi',
        'kelas' => 'http://bios.djpbn.kemenkeu.go.id/web_services/ref_kelas',
        'akreditasi' => 'http://bios.djpbn.kemenkeu.go.id/web_services/ref_akreditasi',
        'akunpenerimaan' => 'http://lk.bios.djpbn.kemenkeu.go.id/api/services/getReferensiAkunPenerimaan',
        'akunpengeluaran' => 'http://lk.bios.djpbn.kemenkeu.go.id/api/services/getReferensiAkunPengeluaran',
        'jenisrekening' => 'http://lk.bios.djpbn.kemenkeu.go.id/api/services/getReferensiJenisRekening'
    ],
];
