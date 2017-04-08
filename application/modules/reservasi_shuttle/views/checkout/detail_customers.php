
<?php  if ($penumpang->id_status_pemesanan_shuttle == 1): ?>
<?php include 'detail_customer_booking.php'; ?>
<?php elseif($penumpang->id_status_pemesanan_shuttle == 2): ?>
<?php include 'detail_customer_go_show.php'; ?>
<?php endif; ?>
