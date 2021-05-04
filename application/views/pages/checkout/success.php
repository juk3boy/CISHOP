<main role="main" class="container">

    <?php $this->load->view('layouts/_alert') ?>

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div> <!-- Akhir dari card-header -->

                <div class="card-body">
                    <h5>Nomor Order : <?= $content->invoice ?></h5>
                    <p>Terimakasih sudah berbelanja</p>
                    <p>Silahkan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara sbb :</p>
                    <ol>
                        <li>Lakukan pembayaran dengan mentransfer ke <strong>Rek. BCA 453456453453</strong> an. PT. CI SHOP</li>
                        <li>Sertakan keterangan dengan nomor order : <strong><?= $content->invoice ?></strong></li>
                        <li>Total pembayaran <strong>Rp. <?= number_format($content->total, 0, ',', '.') ?>,-</strong></li>
                    </ol>

                    <p>Jika sudah melakukan pembayaran melalu transfer, silahkan kirim bukti transfer dihalaman konfirmasi atau bisa <a href="<?= base_url("/myorder/detail/$row->id") ?>">klik disini</a></p>
                    <a href="<?= base_url('/') ?>" class="btn btn-primary"> <i class="fas fa-angle-left me-1"></i> Kembali</a>
                </div>
            </div> <!-- Akhir dari card -->



        </div> <!-- Akhir dari col-md-12 -->
    </div>



</main>