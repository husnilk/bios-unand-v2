@extends('admin.default')

@section('content')
<?php $i = 1; ?>

<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4 class="c-grey-900">
                            Edit Akun Penerimaan
                        </h4>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="{!! route('penerimaan.index') !!}" class="btn btn-primary btn-sm form pull-right">
                            Close <span class="glyphicon glyphicon-minus-sign"></span>
                        </a>
                    </div>
                </div>
                <div class="mT-30">
                    
                    {{ Form::model($akun, ['route' => ['penerimaan.update', $akun->id], 'class' => 'form-horizontal', 'method' => 'PATCH']) }}

                        @include('keuangan.penerimaan._form')

                    {{ Form::close() }}
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush