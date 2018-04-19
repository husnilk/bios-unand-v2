@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Referensi Jenis Akun

                        <form action="{!! route('ref.getjenisakun') !!}" method="POST" class="form pull-right">
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" type="submit">
                                Sinkronisasi <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                        </form>
                    </div>

                    <div class="panel-body">

                        <table class="table table-bordered" id="ref-table">
                            <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th>Jenis</th>
                                <th>Kode</th>
                                <th>Nama Akun</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
            ajax: '{!! route('ref.jenisakundata') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'jenis', name: 'jenis' },
                { data: 'kode', name: 'kode' },
                { data: 'uraian', name: 'uraian' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
</script>
@endpush