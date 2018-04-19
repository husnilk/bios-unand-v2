@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        Tambah Data Layanan

                    </div>

                    <div class="panel-body">

                        {!! Form::open(['route' => 'layanan.store', 'class' => 'form form-horizontal']) !!}

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