<h3>BIAYA OPERASIONAL</h3>
<br>
<table class="table">
        <?php if($jumlah_penumpang > 0):?>
        <tr>
            <th> - Biaya BBM</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest->biaya_bbm)?></th>
        </tr>
        <tr>
            <th> - Biaya Tol</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest->biaya_tol)?></th>
        </tr>
        <tr>
            <th> - Biaya Sopir</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest->biaya_sopir)?></th>
        </tr>
        <tr>
           <td colspan="3" height="30"></td>
        </tr>
        <?php else:?>
        <tr>
            <th> - Biaya Perpal</th>
            <th>:</th>
            <th style="text-align:right;"><?php echo rupiah($manifest->biaya_perpal)?></th>
        </tr>
        <tr>
           <td colspan="3" height="30"></td>
        </tr>
        <?php endif;?>
        <tr>
            <th> - BIAYA TOTAL</th>
            <th>:</th>
            <th style="text-align:right;"><?php //; ?></th>
        </tr>
         <tr>
           <td colspan="3" height="30"></td>
        </tr>
    
</table>
