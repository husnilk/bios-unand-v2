@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Detail Data Layanan

                    </div>

                    <div class="panel-body">

                        <form class="form-horizontal">

                            <div class="form-group">
                                {!! Form::label("null", "Tahun", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->tahun }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Bulan", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->bulan }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Fakultas", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->fakultas }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Jurusan", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->jurusan }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Program Studi", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->prodi }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Akreditasi", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->akreditasi }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Created At", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->created_at }}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label("null", "Updated At", ["class" => "col-sm-3 control-label"]) !!}
                                <div class="col-sm-9">
                                    <p class="form-control-static">{{ $layanan->updated_at }}</p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

@endpush