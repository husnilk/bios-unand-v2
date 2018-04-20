@extends('admin.default')

@section('content')
<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Detail Data Layanan</h6>
                <div class="mT-30">
                
                    <form class="form-horizontal">

                        <div class="form-group row">
                            {!! Form::label('tahun', "Tahun", ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->tahun }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("bulan", "Bulan", ["class" => "col-sm-3 col-form-label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->bulan }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("fakultas_id", "Fakultas", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->fakultas }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("jurusan_id", "Jurusan", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->jurusan }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("program_studi_id", "Program Studi", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->prodi }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("akreditasi_id", "Akreditasi", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->akreditasi }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("created_at", "Created At", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->created_at }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label("updated_at", "Updated At", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $layanan->updated_at }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('scripts')

@endpush