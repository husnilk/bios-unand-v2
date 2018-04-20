<div class="form-group row">
    {!! Form::label('tahun', "Tahun", ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('tahun', null, ['class' => 'form-control', 'placeholder' => 'Tahun']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("bulan", "Bulan", ["class" => "col-sm-3 col-form-label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("bulan", $bulan, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("fakultas_id", "Fakultas", ["class" => "col-sm-3 col-form--label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("fakultas_id", $fakultasRefs, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("jurusan_id", "Jurusan", ["class" => "col-sm-3 col-form--label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("jurusan_id", $jurusanRefs, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("program_studi_id", "Program Studi", ["class" => "col-sm-3 col-form--label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("program_studi_id", $prodiRefs, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label("akreditasi_id", "Akreditasi", ["class" => "col-sm-3 col-form--label"]) !!}
    <div class="col-sm-9">
        {!! Form::select("akreditasi_id", $akreditasiRefs, null, ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-offset-3 col-sm-9">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $('select[name=fakultas_id]').select2({theme: 'bootstrap'});
    $('select[name=jurusan_id]').select2({theme: 'bootstrap'});
</script>
@endpush