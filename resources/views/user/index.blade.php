@extends('admin.default')

@section('content')

<?php $i = 1; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <div class="row">
                    <div class="col-md-8">
                        
                        <h4 class="c-grey-900 mB-20"> 
                        Saldo Rekening
                        </h4>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="{!! route('user.create') !!}" class="btn btn-primary btn-sm form pull-right">
                            Tambah <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </div>
                </div>
                
                <hr>
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>

            </div>
            
        </div>
    </div>
</div>

<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
 
@endsection

@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('user.userdata') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'username', name: 'kode' },
                { data: 'name', name: 'name' },
                { data: 'role', name: 'role'},
                { data: 'action', name: 'action' },
            ]
        });
    });

    function onClickDelete(route){
        response = confirm("Anda yakin akan menghapus data akun ini?");
        console.log(route);
        if(response == true){
            form = document.getElementById('delete-form')
            form.action = route;
            form.submit();
        }
    }
</script>
@endpush