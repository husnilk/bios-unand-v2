@extends('admin.default')

@section('content')
<div id="mainContetn">
    <div class="container-fluid">
        <div class="masonry-item col-md-12">
            
            <div class="bgc-white p-20 bd">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4 class="c-grey-900 mB-20"> 
                            Profil Pengguna
                        </h4>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="{!! route('profile.edit') !!}" class="btn btn-primary btn-sm form pull-right">
                            <span class="ti-pencil"></span> Edit 
                        </a>
                    </div>
                </div>
                <div class="mT-30">
                    
                    <form class="form-horizontal">
                        
                        <div class="form-group row">
                            {!! Form::label('username', "Username", ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->username }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("name", "Nama", ["class" => "col-sm-3 col-form-label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->name }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("email", "Email", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->email }}</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {!! Form::label("role", "Role", ["class" => "col-sm-3 col-form--label"]) !!}
                            <div class="col-sm-9">
                                <p class="form-control-static">{{ $profile->role }}</p>
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