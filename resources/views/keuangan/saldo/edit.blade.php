@extends('layouts.app')

@section('content')
    <?php $i = 1; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Edit Akun Pengeluaran

                        <a href="{!! route('saldo.index') !!}" class="btn btn-primary btn-sm form pull-right">
                            Close <span class="glyphicon glyphicon-minus-sign"></span>
                        </a>
                    </div>

                    <div class="panel-body">

                        {{ Form::model($saldo, ['route' => ['saldo.update', $saldo->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

                        @include('keuangan.saldo._form')

                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush