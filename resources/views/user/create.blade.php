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
                            Tambah User
                        </h4>
                        
                    </div>
                </div>
                
                
                <div class="mT-30">
                    {{ Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'method' => 'POST']) }}
                    
                    @include('user._form')
                    
                    {{ Form::close() }}
                    
                    <hr>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush