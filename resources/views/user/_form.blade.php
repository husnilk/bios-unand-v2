<div class="form-group row">
    {!! Form::label('name', "Nama", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'nama']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("username", "Username", ["class" => "col-sm-2 control-label"]) !!}
    <div class="col-sm-10">
        {!! Form::text("username", null, ["class" => "form-control", 'placeholder' => 'username untuk login']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('email', "Email", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Pengguna']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('role', "Role", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('role', $roles, 2, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('status', "Status", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('status', $statuses, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('password', "Password", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password untuk login']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>