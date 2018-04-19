@extends('layouts.app')

@section('content')
    <?php $i = 1; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Akun Pengeluaran

                        <a href="{!! route('pengeluaran.create') !!}" class="btn btn-primary btn-sm form pull-right">
                            Tambah <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        @include('keuangan.pengeluaran._table')

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush