<main role="main" class="container">

    <?php $this->load->view('layouts/_alert'); ?>

    <div class="row">

        <!-- Kolom besar -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong> Formulir Alamat Pengiriman </strong>
                </div>
                <div class="card-body">
                    <form action=" <?= base_url("/checkout/create") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value=" <?= $input->name; ?>">
                            <?= form_error('name') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control"> <?= $input->address; ?></textarea>
                            <?= form_error('address') ?>
                        </div>

                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value=" <?= $input->phone; ?>">
                            <?= form_error('phone') ?>
                        </div>

                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                    </form>
                </div> <!-- Akhir dari card-body -->
            </div> <!-- Akhir dari card -->

        </div> <!-- Akhir dari col-md-8 -->

        <!-- Kolom kecil / col-md-4 -->
        <div class="col-md-4">


            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <strong> Cart </strong>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Harga</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($cart as $row) : ?>
                                        <tr>
                                            <td> <?= $row->title ?></td>
                                            <td class="text-center"><?= $row->qty ?></td>
                                            <td class="text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                        </tr>

                                        <tr>
                                            <td colspan="2">Subtotal</td>
                                            <td class="text-center">Rp. <?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th class="text-center">Rp. <?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-</th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div><!-- Akhir dari card body -->

                    </div> <!-- Akhir dari card-mb3 -->
                </div> <!-- Akhir dari kolom kecil / col-md-4 -->
            </div>
        </div> <!-- Akhir dari col-md-12 -->



    </div>

    </div>



</main>