<?= $this->extend('layout/template')?>
<?= $this->section('content')?>
<div class="col-12 mt-3">
        <h2>Data Pelanggan</h2>
    </div>
    <div class="container">
        <div class="row">
        <div class="col-12 mt-3">
                <div class="card card-info">
                    <div class="card-header">
                        Tambah Data
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label for="tgl_penjualan" class="col-sm-4 col-form-label">Tanggal Penjualan</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo date('Y-m-d'); ?>" readonly>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="total_harga" name="total_harga" readonly>
                            <div class="row mb-3">
                                <label for="id_pelanggan" class="col-sm-4 col-form-label">ID Pelanggan</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="id_pelanggan" name="id_pelanggan">
                                        <option value="">Pilih ID Pelanggan</option>
                                        <?php foreach ($pelanggan as $item) : ?>
                                            <option value="<?= $item->id_pelanggan; ?>"><?= $item->id_pelanggan; ?></option>
                                        <?php endforeach; ?>
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
                        Daftar Pelanggan
                    </div>
                    <div class="card-body">
                        <div class="custom-scroll" style="max-height: 500px; overflow-y: auto;">
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: auto; white-space: nowrap;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Penjualan</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Total Harga</th>
                                            <th>ID Pelanggan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showData">
                                    </tbody>
                                </table>
                            </div>
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
                        url: 'penjualan/tampil',
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
                                        '<td>' + data[i].id_penjualan + '</td>' +
                                        '<td>' + data[i].tgl_penjualan + '</td>' +
                                        '<td>' + data[i].total_harga + '</td>' +
                                        '<td>' + data[i].id_pelanggan + '</td>' +
                                        '<td>' +
                                        // '<button id="edit" data-id="' + data[i].id_penjualan + '" class="btn btn-warning">Edit</button>' + ' ' +
                                        // '<button id="hapus" data-id="' + data[i].id_penjualan + '" class="btn btn-danger">Hapus</button>' +
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

                    var tgl = $('#tgl_penjualan').val();
                    var total = $('#total_harga').val();
                    var idPelanggan = $('#id_pelanggan').val();
                    var id = $('#id_penjualan').val();

                    $.ajax({
                        url: 'penjualan/simpan',
                        type: 'post',
                        data: {
                            tgl: tgl,
                            total: total,
                            idPelanggan: idPelanggan,
                        },
                        success: function(data) {
                            $('#tgl_penjualan').val('');
                            $('#total_harga').val('');
                            $('#id_pelanggan').val('');
                            tampil_data();
                        }
                    })
                });
                // end simpan
            })
        </script>
<?=$this->endSection('content')?>