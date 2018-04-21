@extends('admin.default')

@section('content')

<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Ubah Password</h6>
                <div class="mT-30">
                    
                    {!! Form::open(['route' => ['password.update'], 'method'=> 'POST', 'class' => 'form form-horizontal']) !!}
                    
                    <div class="form-group row">
                        {!! Form::label('old_password', "Password Lama", ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::input('password', 'old_password', null, ['class' => 'form-control', 'placeholder' => 'Password Anda saat ini']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {!! Form::label('new_password', "Password Baru", ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::input('password', 'new_password', null, ['class' => 'form-control', 'placeholder' => 'Password Anda yang baru']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {!! Form::label('new_password_confirm', "Konfirmasi Password Baru", ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::input('password', 'new_password_confirm', null, ['class' => 'form-control', 'placeholder' => 'Konfirmasi password Anda yang baru']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-offset-3 col-sm-9">
                            {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('scripts')

@endpush
