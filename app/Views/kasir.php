<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="col-12 mt-3">
    <div class="row">
        <!-- Bagian Kiri (Daftar Menu) -->
        <div class="col-md-5">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Menu List</h3>
                </div>
                <div class="card-body">
                    <!-- Kategori Menu -->
                    <!-- <div class="btn-group">
                        <button type="button" class="btn btn-success" onclick="showAll()">All</button>
                        <button type="button" class="btn btn-success" onclick="showFood()">Food</button>
                        <button type="button" class="btn btn-success" onclick="showDrink()">Drink</button>
                    </div> -->
                    <div class="custom-scroll" style="max-height: 495px; overflow-y: auto;">
                        <!-- Daftar Card Menu -->
                        <div class="row mt-3">
                            <!-- Card 1 -->
                            <?php foreach ($produk as $item) : ?>
                                <div class="col-md-6 food">
                                    <div class="card">
                                        <img src="<?= base_url('/foto/food.jpg') ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $item->nama_produk ?></h5>
                                            <p class="card-text">Rp. <?= $item->harga ?></p>
                                            <input type="hidden" name="id_produk" value="<?= $item->id_produk ?>">
                                            <button type="button" class="btn btn-primary btn-cart" data-id_produk="<?= $item->id_produk ?>" data-nama_produk="<?= $item->nama_produk ?>" data-harga="<?= $item->harga ?>">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <!-- Bagian Perhitungan -->
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Transaksi</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_penjualan" class="col-sm-4 col-form-label">ID Penjualan</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="id_penjualan" name="id_penjualan">
                                    <?php foreach ($penjualan as $item) : ?>
                                        <option value="<?= $item->id_penjualan; ?>"><?= $item->id_penjualan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bagian Kanan (Transaksi Kasir) -->
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Produk</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tabel Transaksi -->
                        <div class="custom-scroll" style="max-height: 500px; overflow-y: auto;">
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: auto; white-space: normal;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Penjualan</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>SubTotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="showData">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Total Pembayaran -->
                        <div class="text-right">
                            <h6>Total Harga: </h6>
                            <h6>Uang: </h6>
                            <h6>Kembalian: </h6>
                        </div>

                        <!-- Tombol Checkout -->
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-success" id="checkout">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var transactions = []; // Array untuk menyimpan data transaksi

        // Fungsi untuk menambahkan data ke tabel transaksi saat tombol "Add to Cart" diklik
        $('.btn-cart').click(function() {
            var id_penjualan = $('#id_penjualan').val();
            var id_produk = $(this).data('id_produk');
            var nama_produk = $(this).data('nama_produk');
            var harga = $(this).data('harga');
            var jumlah = 1; // Jumlah default

            // Hitung subtotal
            var subtotal = harga * jumlah;

            // Mendefinisikan array kosong untuk menyimpan data siswa
            var transactions = [];

            // Menambahkan data siswa menggunakan array
            for (var i = 0; i < 6; i++) {
                // Membuat objek untuk setiap siswa
                var transaction = {
                    id_penjualan: id_penjualan,
                    id_produk: id_produk,
                    nama_produk: nama_produk,
                    harga: harga,
                    jumlah: jumlah,
                    subtotal: subtotal
                };

                // Menambahkan objek siswa ke dalam array students
                transactions.push(transaction);
            }

            // Tambahkan data transaksi ke array
            // var transaction = {
            //     id_penjualan: id_penjualan,
            //     id_produk: id_produk,
            //     nama_produk: nama_produk,
            //     harga: harga,
            //     jumlah: jumlah,
            //     subtotal: subtotal
            // };
            // transactions.push(transaction);

            // Tambahkan baris baru ke tabel transaksi
            var tableRow = '<tr data-id_produk="' + id_produk + '" data-harga="' + harga + '">' +
                '<td>' + id_penjualan + '</td>' +
                '<td>' + nama_produk + '</td>' +
                '<td class="quantity-cell">' +
                '<span class="quantity">' + jumlah + '</span>' +
                '</td>' +
                '<td class="subtotal">Rp. ' + subtotal.toFixed(2) + '</td>' +
                '<td class="action-cell">' +
                '<button class="btn btn-sm btn-primary btn-increase-quantity">+</button>' + ' ' +
                '<button class="btn btn-sm btn-primary btn-decrease-quantity">-</button>' + ' ' +
                '<button class="btn btn-sm btn-danger btn-remove-from-cart">Remove</button>' +
                '</td>' +
                '</tr>';

            // Masukkan baris baru ke dalam tabel transaksi
            $('#showData').append(tableRow);
        });

        // Fungsi untuk menghapus item dari tabel transaksi saat tombol "Remove" diklik
        $('#showData').on('click', '.btn-remove-from-cart', function() {
            var id_produk = $(this).closest('tr').data('id_produk');
            transactions = transactions.filter(function(transaction) {
                return transaction.id_produk !== id_produk;
            });

            // Hapus baris dari tabel transaksi
            $(this).closest('tr').remove();
        });

        // Fungsi untuk menambah jumlah produk
        $('#showData').on('click', '.btn-increase-quantity', function() {
            var quantityElement = $(this).closest('tr').find('.quantity');
            var quantity = parseInt(quantityElement.text());
            quantityElement.text(quantity + 1);
            updateSubtotal($(this));
        });

        // Fungsi untuk mengurangi jumlah produk
        $('#showData').on('click', '.btn-decrease-quantity', function() {
            var quantityElement = $(this).closest('tr').find('.quantity');
            var quantity = parseInt(quantityElement.text());
            if (quantity > 1) {
                quantityElement.text(quantity - 1);
                updateSubtotal($(this));
            }
        });

        // Fungsi untuk mengupdate subtotal saat jumlah produk diubah
        function updateSubtotal(button) {
            var quantity = parseInt(button.closest('tr').find('.quantity').text());
            var harga = parseFloat(button.closest('tr').data('harga'));
            var subtotal = quantity * harga;
            button.closest('tr').find('.subtotal').text('Rp. ' + subtotal.toFixed(2));
        }

        // Fungsi untuk menangani klik tombol "Checkout"
        $('#checkout').click(function() {
            // Kirim data transaksi ke server melalui AJAX
            $.ajax({
                url: '/checkout', // Ubah URL sesuai dengan endpoint yang benar
                method: 'POST', // Gunakan metode POST
                dataType: 'json',
                data: {
                    transactions: transactions
                },
                success: function(response) {
                    // Tampilkan pesan sukses atau lakukan aksi lain yang diperlukan
                    console.log(response);
                    alert('Checkout berhasil!');
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan saat melakukan checkout.');
                }
            });
        });
    });
</script>


<?= $this->endSection(); ?>