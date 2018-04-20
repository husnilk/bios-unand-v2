<table class="table table-bordered" id="ref-table">
    <thead>
    <tr>
        <th class="text-center">
            <button class="btn btn-danger btn-sm" onclick="confirmDelete()">
                <i class="ti-trash"></i>
            </button>
        </th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Kode Akun</th>
        <th class="text-center">Saldo</th>
        <th class="text-center">Tanggal Update</th>
        <th class="text-center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($akuns as $akun)
        <tr>
            <td class="text-center"><input type="checkbox" class="akun-delete" name="itemDelete[{{$akun->id}}]"> </td>
            <td class="text-center">{{ $akun->tanggal }} </td>
            <td >{{ $kodeAkunRef[$akun->kode_akun_id] }}</td>
            <td class="text-right">{{ $akun->saldo }}</td>
            <td class="text-center">{{ $akun->updated_at }}</td>
            <td class="text-center">
                <a href="{!! route('pengeluaran.edit', [$akun->id]) !!}" class="btn btn-link">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $akuns->links() }}

<form action="{{route('pengeluaran.destroy',[1])}}" method="POST" id="form-delete">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">

</form>



@push('scripts')

<script type="text/javascript">

    function confirmDelete()
    {
        var d = document.getElementsByClassName('akun-delete');
        var form = document.getElementById('form-delete');
        var selected = 0;

        for (var i = 0; i < d.length;  i++)
        {
            if(d[i].checked == true)
            {
                selected++;
            }
        }
        if(selected > 0){
            response = confirm("Anda yakin akan menghapus data akun ini?");
            if(response == true)
            {
                //delete the data
                for (var i = 0; i < d.length;  i++)
                {
                    var input = d[i];
                    if(input.checked == true)
                    {
                        var newInput = document.createElement('input');
                        newInput.checked = true;
                        newInput.type = 'checkbox';
                        newInput.name = input.name;
                        newInput.style = "display:none";

                        form.appendChild(newInput);
                    }
                }
                form.submit();
            }
        }else{
            alert('Pilih terlebih dahulu data yang akan dihapus');
        }

    }
</script>

@endpush
