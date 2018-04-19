@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Data Layanan

                        <a href="{!! route('layanan.create') !!}" class="btn btn-primary btn-sm form pull-right">
                            Tambah <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered" id="ref-table">
                            <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th>Tahun</th>
                                <th>Bulan</th>
                                <th>Fakultas</th>
                                <th>Jurusan</th>
                                <th>Prodi</th>
                                <th>Akreditasi</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

<script>
    $(function() {
        $('#ref-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('layanan.data') !!}',
            columns: [
                { data: 'id', name: 'layanan.id' },
                { data: 'tahun', name: 'layanan.tahun' },
                { data: 'bulan', name: 'layanan.bulan' },
                { data: 'fakultas', name: 'fakultas.nama' },
                { data: 'jurusan', name: 'jurusan.nama' },
                { data: 'prodi', name: 'prodi.nama' },
                { data: 'akreditasi', name: 'akreditasi.nama' },
                { data: 'created_at', name: 'layanan.created_at' },
                { data: 'updated_at', name: 'layanan.updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>

@endpush