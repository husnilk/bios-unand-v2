@extends('admin.default')

@section('content')

<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Tambah Data Layanan</h6>
                <div class="mT-30">
                    
                    {!! Form::model($layanan, ['route' => ['layanan.update', $layanan->id], 'method'=> 'PUT', 'class' => 'form form-horizontal']) !!}
                    
                    @include('layanan._form')
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('scripts')

@endpush