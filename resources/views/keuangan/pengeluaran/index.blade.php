@extends('admin.default')

@section('content')

<?php $i = 1; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4 class="c-grey-900 mB-20"> 
                            Akun Pengeluaran
                        </h4>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="{!! route('pengeluaran.create') !!}" class="btn btn-primary btn-sm form pull-right">
                            Tambah <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
                <hr>
                
                 @include('keuangan.pengeluaran._table')

            </div>
            
        </div>
    </div>
</div>

@endsection

@push('scripts')

@endpush