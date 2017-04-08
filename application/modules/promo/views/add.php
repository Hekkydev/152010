<div class="row">
    <div class="col-lg-12">
        <?php 
        $form = array(
                'class'=>'form-horizontal',
                'id'=>'form-promo-tiket',
                'onSubmit'=>'return validasi_promo()',
                'method'=>'POST',
            );
        ?>
        <?php echo form_open('promo/entri',$form);?>
            <div class="form-group form-group-sm">
                    <label class="control-label col-lg-3">KODE PROMO</label>
                    <div class="col-lg-9">
                        <input class="form-control input-sm" required="required" readonly="readonly">
                    </div>
            </div>

            <div class="form-group form-group-sm">
                    <label class="control-label col-lg-3">KODE PROMO</label>
                    <div class="col-lg-9">
                        <input class="form-control input-sm" required="required" readonly="readonly">
                    </div>
            </div>
            <div class="form-group form-group-sm">
                    <label class="control-label col-lg-3">KODE PROMO</label>
                    <div class="col-lg-9">
                        <input class="form-control input-sm" required="required" readonly="readonly">
                    </div>
            </div>

        <?php echo form_close();?>
    </div>
</div>