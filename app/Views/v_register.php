<?= $this->extend('layout/awalan')?>
<?= $this->section('content')?>

<div class="container">
        <div class="row">
        <div class="col-12 mt-3">
                <div class="card card-info">
                    <div class="card-header">
                        Tambah Data
                    </div>
                    <div class="card-body">
                        <form id="form-tambah">
                            <div class="row mb-3">
                                <label for="username" class="col-sm-4 col-form-label">username</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id_user" id="id_user">
                                    <input type="hidden" name="status" id="status">
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama_user" class="col-sm-4 col-form-label">Nama User</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama_user" name="nama_user">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-4 col-form-label">Role</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="role" name="role">
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card card-info">
                    <div class="card-header">
                        Daftar User
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto; overflow-y: auto; white-space: nowrap;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>username</th>
                                        <th>Password</th>
                                        <th>Nama User</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="showData">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?= base_url() ?>adminlte/plugins/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                tampil_data();

                function tampil_data() {
                    $.ajax({
                        url: 'user/show',
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            var HTML = '';
                            var i;
                            var no = 0;

                            if (data.length == 0) {
                                HTML += '<tr>' +
                                    '<td colspan = "5" class = "text-center"> Data pada tabel masih kosong </td>' +
                                    '</tr>'
                                $('#showData').html(HTML);
                            } else {
                                for (i = 0; i < data.length; i++) {
                                    no++;
                                    HTML += '<tr>' +
                                        '<td>' + no + '</td>' +
                                        '<td>' + data[i].username + '</td>' +
                                        '<td>' + data[i].password + '</td>' +
                                        '<td>' + data[i].nama_user + '</td>' +
                                        '<td>' + data[i].role + '</td>' +
                                        '<td>' +
                                        '<button id="edit" data-id="' + data[i].id_user + '" class="btn btn-warning">Edit</button>' + ' ' +
                                        '<button id="hapus" data-id="' + data[i].id_user + '" class="btn btn-danger">Hapus</button>' +
                                        '</td>' +
                                        '</tr>'
                                }
                                $('#showData').html(HTML);
                            }
                        }
                    })
                }

                $('#simpan').on('click', function(e) {
                    e.preventDefault();

                    var username = $('#username').val();
                    var password = $('#password').val();
                    var namaUser = $('#nama_user').val();
                    var role = $('#role').val();
                    var status = $('#status').val();
                    var id = $('#id_user').val();

                    if (status == '') {
                        $.ajax({
                            url: 'user/simpan',
                            type: 'post',
                            data: {
                                username: username,
                                password: password,
                                namaUser: namaUser,
                                role: role
                            },
                            success: function(data) {
                                $('#username').val('');
                                $('#password').val('');
                                $('#nama_user').val('');
                                $('#role').val('');

                                tampil_data();
                            }
                        })
                    } else if (status == 'update') {
                        $.ajax({
                            url: 'user/update',
                            type: 'post',
                            data: {
                                id_user: id,
                                username: username,
                                password: password,
                                namaUser: namaUser,
                                role: role
                            },
                            success: function(data) {
                                $('#username').val('');
                               // $('#password').val('');
                                $('#nama_user').val('');
                                $('#role').val('');
                                $('#status').val('');

                                tampil_data();
                            }
                        })
                    }
                });
                // end simpan

                //edit
                $('#showData').on('click', '#edit', function(e) {
                    e.preventDefault();

                    var id = $(this).data('id');

                    $.ajax({
                        url: 'user/edit',
                        type: 'get',
                        dataType: 'json',
                        data: {
                            id_user: id
                        },
                        success: function(data) {
                            console.log(data)

                            $('#id_user').val(data.id_user);
                            $('#username').val(data.username);
                           // $('#password').val(data.password);
                            $('#nama_user').val(data.nama_user);
                            $('#role').val(data.role);
                            $('#status').val('update');
                        },
                    });
                });

                //delete
                $('#showData').on('click', '#hapus', function(e) {
                    e.preventDefault();

                    var id = $(this).data('id');
                    console.log('Berhasil Dihapus');

                    $.ajax({
                        method: 'post',
                        url: 'user/delete',
                        data: {
                            id_user: id
                        },
                        success: function(data) {
                            tampil_data();
                            $('id_user').focus();
                        }
                    });
                });
                //end delete
            })
        </script>
<?=$this->endSection('content')?>