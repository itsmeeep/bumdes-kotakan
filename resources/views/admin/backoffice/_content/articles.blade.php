@extends('admin.backoffice.index')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap4.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('') }}admin/backoffice/dist/assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="{{ asset('') }}admin/backoffice/dist/assets/modules/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="{{ asset('') }}admin/backoffice/dist/assets/modules/codemirror/theme/duotone-dark.css">
<link rel="stylesheet" href="{{ asset('') }}admin/backoffice/dist/assets/modules/jquery-selectric/selectric.css">

@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Master Artikel</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah-artikel">Tambah Artikel</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Dibuat pada</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $news)
                        <tr>
                            <td>{{ $news->news_id }}</td>
                            <td>{{ $news->news_title }}</td>
                            <td>{{ Str::substr(strip_tags($news->news_description), 0, 70) }}</td>
                            <td>{{ \Carbon\Carbon::parse($news->news_created_date)->format('d F Y') }}</td>
                            <td>
                                <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-update-artikel" onclick="modalUpdateArtikel('{{ $news->news_id }}', `{{ $news->news_title }}`, `{{ asset('') }}images/news/{{ $news->news_picture }}`,`{{ $news->news_description }}`)"><i class="fas fa-edit"></i> Edit</button>
                                <button href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-artikel" onclick="modalDeleteArtikel('{{ $news->news_id }}', `{{ $news->news_title }}`)"><i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete-artikel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <input type="hidden" name="id-delete-artikel" id="id-delete-artikel">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Hapus Data Artikel</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda Yakin Akan Menghapus Data Artikel</p>
                                <p><b><h3 id="delete-artikel-title"></h3></b</p>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="deleteDataArtikel()">Hapus Data</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-artikel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Tambah Data Artikel</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.articles.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="tambah-artikel-title" id="tambah-artikel-title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="tambah-artikel-image" id="tambah-artikel-image" onchange="previewImage(event)" type="file" accept="image/*" required>
                                        <div id="preview-container" style="margin-top:10px;">
                                            <img id="preview" src="#" alt="Image Preview" style="display:none; max-width:350px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="summernote-simple" name="tambah-artikel-description" id="tambah-artikel-description"></textarea>
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

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-update-artikel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <b>Edit Data Artikel</b>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.articles.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="update-artikel-id" id="update-artikel-id">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="update-artikel-title" id="update-artikel-title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="update-artikel-image" id="update-artikel-image" onchange="updatePreviewImage(event)" type="file" accept="image/*">
                                        <div id="update-preview-container" style="margin-top:10px;">
                                            <img id="update-preview" src="#" alt="Image Preview" style="display:none; max-width:350px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="summernote-simple" name="update-artikel-description" id="update-artikel-description"></textarea>
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

<!-- JS Libraies -->
<script src="{{ asset('') }}admin/backoffice/dist/assets/modules/summernote/summernote-bs4.js"></script>
<script src="{{ asset('') }}admin/backoffice/dist/assets/modules/codemirror/lib/codemirror.js"></script>
<script src="{{ asset('') }}admin/backoffice/dist/assets/modules/codemirror/mode/javascript/javascript.js"></script>
<script src="{{ asset('') }}admin/backoffice/dist/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            order: [[0, 'asc']],
        });

        $('.summernote-simple').summernote({
            height: 200,
            placeholder: 'Type description here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // tambah
        $('#tambah-artikel-title').val('');
        $('#tambah-artikel-image').val('');
        $('#tambah-artikel-description').val('');

        // // update
        $('#update-artikel-title').val('');
        $('#update-artikel-image').val('');
        $('#update-artikel-description').val('');

        // // delete
        $('#id-delete-artikel').val('');
    });

    function previewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }


    function updatePreviewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('update-preview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    function modalUpdateArtikel(id, title, photo, description) {
        $('#update-artikel-id').val('');
        $('#update-artikel-title').val('');
        $('#update-artikel-image').val('');
        $('#update-artikel-description').val('');

        $('#update-artikel-id').val(id);
        $('#update-artikel-title').val(title);

        const preview = $('#update-preview');
        if(photo) {
            preview.attr('src', photo).show();
        } else {
            preview.hide();
        }

        $('#update-artikel-description').summernote('code', description);
    }

    function modalDeleteArtikel(id, user) {
        $('#delete-artikel-title').text('[' + user + ']');
        $('#id-delete-artikel').val(id);
    }

    function deleteDataArtikel() {
        id = $('#id-delete-artikel').val();
        url = "{{ route('admin.articles.delete', ['id' => ':id' ]) }}";
        url = url.replace(':id', id);
        window.location.href = url;
    }
</script>

@endsection