@extends('admin.default')

@section('content')
<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4 class="c-grey-900 mB-20"> 
                            Edit Profil Pengguna
                        </h4>
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
                <div class="mT-30">
                    
                    <form class="form-horizontal" action="{{ route('profile.update') }}" method="POST">

                        @csrf
                        
                        <div class="form-group row">
                            {!! Form::label('username', "Username", ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->username }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("name", "Nama", ["class" => "col-sm-3 col-form-label"]) !!}
                            <div class="col-sm-9">
                                <input type="text" name="name" value="{{ $profile->name }}" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("email", "Email", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <input type="text" name="email" value="{{ $profile->email }}" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("role", "Role", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->role }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
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