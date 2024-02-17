<?= $this->extend('layout/layout')?>
<?= $this->section('content')?>
<div class="container">
        <div class="row">
            <div class="col-12 mt-3">
            <div class="card">  
            <div class="card-header">
                Tambah Data
            </div>
            <div class="card-body">
                <form>
                <div class="row mb-3">
                    <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_pelanggan">
                    <input type="hidden" class="form-control" id="id_pelanggan">
                    <input type="hidden" class="form-control" id="status">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-4 col-form-label">Telepon</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="telp">
                    </div>
                </div>
                <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
                </form>
            </div>
            </div>
            </div>
    </div>
    <div class="container">
    <div class="col-12 mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <tr>
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
    <script src="<?= base_url()?>adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            tampil_pelanggan();

            function tampil_pelanggan(){
                $.ajax({ //setelah isi ajax, tambah routes
                    url: 'pelanggan/show',
                    type: 'get',
                    dataType: 'json',
                    success: function(data)
                    {
                        console.log(data);
                        var HTML = '';
                        var i;
                        var no = 0;
                        if(data.length == 0) {
                            HTML += '<tr>' + 
                                    '<td colspan = "5" class = "text-center"> Data pada tabel masih kosong</td>'+
                                    '</tr>'

                            $('#show_data').html(HTML);
                        }else{
                            for (var i = 0; i < data.length; i++) {
                            no++;
                            HTML += '<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + data[i].nama_pelanggan + '</td>' +
                                '<td>' + data[i].alamat + '</td>' +
                                '<td>' + data[i].telp + '</td>' +
                                '<td>' +
                                    '<button id="edit" data-id="' + data[i].id_pelanggan + '" class="btn btn-warning">Edit</button>' + 
                                    '&nbsp;&nbsp;' + 
                                    '<button id="hapus" data-id="' + data[i].id_pelanggan + '" class="btn btn-danger">Hapus</button>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(HTML);
                        }

                        $('#simpan').on('click', function(e){
                            e.preventDefault();
                            
                            var namapelanggan = $('#nama_pelanggan').val();
                            var alamat = $('#alamat').val();
                            var telp = $('#telp').val();
                            var status = $('#status').val();
                            var id = $('#id_pelanggan').val();

                            if(status == '') {
                            $.ajax({
                            url: 'pelanggan/simpan',
                            type: 'post',
                            data: {
                                namapelanggan: namapelanggan,
                                alamat: alamat,
                                telp: telp
                            },
                            success: function(data) {
                                $('#nama_pelanggan').val('');
                                $('#alamat').val('');
                                $('#telp').val('');

                                tampil_pelanggan();
                            }

                            })
                            } else if(status == 'update'){
                            $.ajax({
                            url: 'pelanggan/update',
                            type: 'post',
                            data: {
                                id_pelanggan : id,
                                namapelanggan: namapelanggan,
                                alamat: alamat,
                                telp: telp
                            },
                            success: function(data) {
                                $('#nama_pelanggan').val('');
                                $('#alamat').val('');
                                $('#telp').val('');
                                $('#status').val('');

                                tampil_pelanggan();
                            }

                            })
                            }

                        
                        });
                         //edit
                        $('#show_data').on('click', '#edit', function(e) {
                            e.preventDefault();

                            var id = $(this).data('id');
                            $.ajax({
                            url: 'pelanggan/edit',
                            type: 'get',
                            dataType: 'json',
                            data: {
                                id_pelanggan: id
                            },
                            success: function(data) {
                                console.log(data);
                                alert(id);

                                $('#id_pelanggan').val(data.id_pelanggan);
                                $('#nama_pelanggan').val(data.nama_pelanggan);
                                $('#alamat').val(data.alamat);
                                $('#telp').val(data.telp);
                                $('#status').val('update');
                            },
                            });
                        });

                        //update
                        $('#update').on('click', function(e) {
                            e.preventDefault();

                             
                            var namapelanggan = $('#nama_pelanggan').val();
                            var alamat = $('#alamat').val();
                            var telp = $('#telp').val();
                            
                            
                            $.ajax({
                            url: 'pelanggan/update',
                            type: 'post',
                            data: {
                                namapelanggan: namapelanggan,
                                alamat: alamat,
                                telp: telp
                            },
                            success: function(data) {
                                $('#nama_pelanggan').val('');
                                $('#alamat').val('');
                                $('#telp').val('');

                                tampil_pelanggan();
                            }

                            })
                        });
                          //delete

                        $('#show_data').on('click','#hapus', function(e){
                            e.preventDefault();

                            var id = $(this).data('id');
                            console.log('Berhasil Dihapus');
                            

                            $.ajax({
                            method : 'post',
                            url : 'pelanggan/delete',
                            data : {id_pelanggan:id},
                            success : function(data){
                                tampil_pelanggan();
                                $('id_pelanggan').focus();
                            }
                            
                            });

                        });
                        //end delete

                    }
                })

            }
        })
    </script>
<?=$this->endSection('content')?>