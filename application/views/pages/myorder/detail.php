<main role="main" class="container">

    <?php $this->load->view('layouts/_alert'); ?>

    <div class="row">

        <div class="col-md-3">

            <?php $this->load->view('layouts/_menu'); ?>

        </div> <!-- Akhir dari col-md-3 -->

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    Orders Detail <strong>#<?= $order->invoice  ?></strong>
                    <div class="float-end">
                        <!-- <span class="badge rounded-pill bg-info">Menunggu pembayaran</span> -->
                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                    </div>
                </div>
                <div class="card-body">

                    <!-- format tanggal menjadi hari / bulan / tanggal -->
                    <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
                    <p>Nama : <?= $order->name ?></p>
                    <p>No. Telp : <?= $order->phone ?></p>
                    <p>Alamat : <?= $order->address ?> </p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($order_detail as $row) : ?>
                                <tr>
                                    <td>
                                        <span><img src=" <?= $row->image ? base_url("/assets/images/product/$row->image") : base_url('/assets/images/product/default.jpg') ?>" alt="" height="50"><strong> <?= $row->title ?></strong></span>
                                    </td>
                                    <td class="text-center">Rp. <?= number_format($row->price, 0, ',', '.') ?>,-</td>

                                    <td class="text-center"> <?= $row->qty ?></td>

                                    <td class="text-center">Rp. <?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>

                                </tr>

                                <tr>
                                    <td colspan="3"><strong>Total :</strong></td>
                                    <td class="text-center"><strong>Rp. <?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table> <!-- Akhir dari table -->

                </div>

                <div class="card-footer">
                    <a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
                </div>
            </div> <!-- Akhir dari card pd col-md-9 -->

        </div> <!-- Akhir dari col-md-9 -->

    </div> <!-- Akhir dari row -->



</main>