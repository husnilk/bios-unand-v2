<div class="form-group">
    {!! Form::label("null", "Jenis Akun", ["class" => "col-sm-2 control-label"]) !!}
    <div class="col-sm-10">
        <p class="form-control-static">Pengeluaran</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Tanggal', "tanggal", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::date('tanggal', null, ['class' => 'form-control', 'placeholder' => 'tanggal']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("kode_akun_id", "Kode Akun", ["class" => "col-sm-2 control-label"]) !!}
    <div class="col-sm-8">
        {!! Form::select("kode_akun_id", $kodeAkunRef, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('saldo', "Saldo", ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-4">
        {!! Form::text('saldo', null, ['class' => 'form-control', 'placeholder' => 'Saldo']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>


@push("scripts")
<script type="text/javascript">

    $("select[name=kode_akun_id]").select2({
        "theme":"bootstrap"
    });

</script>
@endpush