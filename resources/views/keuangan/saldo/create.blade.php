@extends('layouts.app')

@section('content')
    <?php $i = 1; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Tambah Saldo

                        <a href="{!! route('saldo.index') !!}" class="btn btn-primary btn-sm form pull-right">
                            Close <span class="glyphicon glyphicon-minus-sign"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        {{ Form::open(['route' => 'saldo.store', 'class' => 'form-horizontal', 'method' => 'POST']) }}

                        @include('keuangan.saldo._form')

                        {{ Form::close() }}

                    </div>

                    <div class="panel-body">

                        @include('keuangan.saldo._table')

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush