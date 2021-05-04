<?php

if ($status == 'waiting') {
    $badge_status = 'bg-primary';
    $status = 'Menunggu Pembayaran';
}

if ($status == 'padi') {
    $badge_status = 'bg-info';
    $status = 'Dibayarkan';
}

if ($status == 'delivered') {
    $badge_status = 'bg-success';
    $status = 'Dikirim';
}

if ($status == 'cancel') {
    $badge_status = 'bg-danger';
    $status = 'Dibatalkan';
}

?>

<?php if ($status) : ?>

    <span class="badge rounded-pill <?= $badge_status ?>"><?= $status ?></span>


<?php endif ?>