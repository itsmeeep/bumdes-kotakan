@extends('admin.backoffice.index')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap4.css">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Master Admin</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-user">Tambah Admin</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $adm)
                        <tr>
                            <td>{{ $adm->user_id }}</td>
                            <td>{{ $adm->user_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($adm->user_created_date)->format('d F Y') }}</td>
                            <td>
                                <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-update-user" onclick="modalUpdateAdmin('{{ $adm->user_id }}', '{{ $adm->user_name }}')"><i class="fas fa-edit"></i> Edit</button>
                                <button href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-user" onclick="modalDeleteAdmin('{{ $adm->user_id }}', '{{ $adm->user_name }}')"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <input type="hidden" name="id-delete-admin" id="id-delete-admin">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Hapus Data Admin</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Akan Menghapus Data Admin</p>
                                <p><b><h3 id="delete-admin-username"></h3></b</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="deleteDataAdmin()">Hapus Data</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Tambah Data Admin</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.users.add') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" pattern="[A-Za-z0-9]+" name="tambah-admin-username" id="tambah-admin-username" title="Hanya boleh input huruf dan angka">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" pattern="[A-Za-z0-9]+" name="tambah-admin-password" id="tambah-admin-password" title="Hanya boleh input huruf dan angka">
                                    </div>
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-update-user">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Edit Data Admin</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.users.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="update-admin-id" id="update-admin-id">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" pattern="[A-Za-z0-9]+" name="update-admin-username" id="update-admin-username" title="Hanya boleh input huruf dan angka">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" pattern="[A-Za-z0-9]+" name="update-admin-password" id="update-admin-password" title="Hanya boleh input huruf dan angka">
                                    </div>
                                </div>
                                <div class="modal-footer bg-whitesmoke br">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Update Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap4.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            order: [[0, 'asc']],
        });

        // tambah
        $('#tambah-admin-username').val('');
        $('#tambah-admin-password').val('');

        // update
        $('#update-admin-id').val('')
        $('#update-admin-username').val('');

        // delete
        $('#id-delete-admin').val('');
    });

    function modalUpdateAdmin(id, user) {
        $('#update-admin-id').val('')
        $('#update-admin-username').val('');

        $('#update-admin-id').val(id)
        $('#update-admin-username').val(user);
    }

    function modalDeleteAdmin(id, user) {
        $('#delete-admin-username').text('[' + user + ']')
        $('#id-delete-admin').val(id);
    }

    function deleteDataAdmin() {
        id = $('#id-delete-admin').val();
        url = "{{ route('admin.users.delete', ['id' => ':id' ]) }}";
        url = url.replace(':id', id);
        window.location.href = url;
    }
</script>

@endsection