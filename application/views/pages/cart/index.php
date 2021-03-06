<main role="main" class="container">


    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    Keranjang Belanja
                </div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>

                            </tr>
                        </thead>

                        <tbody class="aglin-middle">

                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td>
                                        <span><img src=" <?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.jpg') ?>" alt="" height="50"><strong> <?= $row->title ?></strong></span>
                                    </td>
                                    <td class="text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                    <td>
                                        <form action=" <?= base_url("cart/update/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value=" <?= $row->id ?>">
                                            <div class="input-group">
                                                <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
                                                <div class="input-group-append">
                                                    <button class="btn btn-info" type="submit"><i class="fas fa-check"></i></button>
                                                </div>
                                            </div> <!-- Akhir dari class input-group -->
                                        </form>
                                    </td>

                                    <td class="text-center">Rp. <?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                    <td>
                                        <!-- base_url dibawah menuju ke controller -->
                                        <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                            <input type="hidden" name="id" value=" <?= $row->id ?>">
                                            <button class="btn btn-danger" type="submit" onclick="Swal.fire('Siap Dihapus', 'Perhatian data ini akan dihapus dan akan hilang permanent !!!', 'warning')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        <!-- return confirm('Are You Sure ?'); -->
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            <tr>
                                <td colspan="3"><strong>Total :</strong></td>
                                <td><strong>Rp. <?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                <!-- fungsi array_sum diatas yaitu menjumlahkan tabel $content dengan tabel subtotal -->
                            </tr>
                        </tbody>
                    </table> <!-- Akhir dari table -->

                </div> <!-- Akhir card-body -->

                <div class="card-footer">
                    <a href=" <?= base_url('/'); ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left me-2"></i>Kembali Belanja</a>
                    <span>


                        <a href=" <?= base_url('/checkout')  ?>" class="btn btn-success float-end" data-bs-placement="left" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Pastikan barang yang anda beli sudah benar" role="button">Pembayaran <i class="fas fa-angle-right me-1"></i></a>
                    </span>

                </div>

            </div> <!-- Akhir dari card mb-3 -->
        </div> <!-- Akhir dari col-md-12 -->

    </div> <!-- Akhir dari row main -->

</main>