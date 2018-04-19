@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Data Keuangan

                        <a href="{!! route('layanan.create') !!}" class="btn btn-primary btn-sm form pull-right">
                            Tambah <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered" id="ref-table">
                            <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Kode Akun</th>
                                <th>Saldo</th>
                                <th>Tanggal Update</th>
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

</script>

@endpush