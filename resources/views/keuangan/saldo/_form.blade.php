<div class="form-group row">
    {!! Form::label('Tanggal', "tanggal", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::date('tanggal', null, ['class' => 'form-control', 'placeholder' => 'tanggal']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("jenis_rekening_id", "Jenis Akun", ["class" => "col-sm-2 control-label"]) !!}
    <div class="col-sm-8">
        {!! Form::select("jenis_rekening_id", $jenisRekRef, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('nama_bank', "Nama Bank", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('nama_bank', null, ['class' => 'form-control', 'placeholder' => 'Nama Bank']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('saldo', "Saldo", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('saldo', null, ['class' => 'form-control', 'placeholder' => 'Saldo']) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-8">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>