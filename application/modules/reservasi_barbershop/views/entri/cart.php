
<table class="table">
  <thead>
    <tr style="background:#f1ffec;">
      <th  style="text-align:left">Service</th>
      <th  style="text-align:center">Qty</th>
      <th  style="text-align:right">Harga</th>
      <th  style="text-align:right">Total</th>
      <th style="text-align:right"> </th>
    </tr>

  </thead>
  <tbody>

<?php $i = 1; foreach ($this->cart->contents() as $items): ?>

          <tr>
                <td style="text-align:left"><?php echo $items['name']; ?></td>
                <td style="text-align:center"><?php echo $items['qty']; ?></td>
                <td style="text-align:right"><?php echo rupiah($items['price']); ?></td>
                <td style="text-align:right">Rp. <?php echo rupiah($items['subtotal']); ?></td>
                <td style="text-align:right"><a class="click" onclick="remove_cart('<?php echo $items['rowid'];?>')"><i class="fa fa-trash"></i></a></td>
        </tr>

<?php $i++; ?>

<?php endforeach; ?>
<tr style="height:30px;">
  <td colspan="5"></td>
</tr>
<tr>

        <td><strong>TOTAL BIAYA</strong></td>
        <td >Rp. <span id="total_biaya"><?php echo rupiah($this->cart->total()); ?></span></td>
        <td > </td>
        <td > </td>
        <td > </td>
</tr>
  </tbody>
</table>
