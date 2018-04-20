@extends('admin.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="c-grey-900 mB-20">Referensi Akreditasi</h4>
                    </div>
                    <div class="col-md-4">
                        <form action="{!! route('ref.getakreditasi') !!}" method="POST" class="form pull-right">
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" type="submit">
                                Sinkronisasi
                                <span class="icon-holder ti-reload"></span>
                            </button>
                        </form>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered" id="ref-table">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Kode</th>
                            <th>Nama Akreditasi</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                </table>
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
            ajax: '{!! route('ref.akreditasidata') !!}',
            columns: [
            { data: 'id', name: 'id' },
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
</script>
@endpush