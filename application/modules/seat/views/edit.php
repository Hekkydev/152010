<?php
$form = array(
    'onSubmit'=>'return validasi()',
    'method'=>'POST',
);
$id = array(
    'name'=>'id_jml_kursi',
    'type'=>'hidden',
    'value'=>$seat->id_jml_kursi,
);
echo form_open('seat/update');
echo form_input($id);
?>


<div class="form-horizontal">
    <div class="col-lg-offset-2 col-lg-8">
        
        <div class="form-group">
            <label class="control-label col-lg-4">Type Kelas :</label>
            <div class="col-lg-6">
                <input type="text" name="tipe_kelas" value="<?php echo $seat->tipe_jenis_kursi?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Jumlah Seat :</label>
            <div class="col-lg-6">
                <input type="text" name="jumlah_kursi" value="<?php echo $seat->jumlah_kursi;?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Jumlah Block :</label>
            <div class="col-lg-6">
                <input type="text" name="jumlah_block" value="<?php echo $seat->jumlah_block;?>" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-4">Type Layout :</label>
            <div class="col-lg-6">
                <select class="form-control input-sm" name="tipe_layout">
                   <?php foreach($mode_block as $key =>$value):?>
                   <?php if($seat->mode_block == $key ):?>
                   <option value="<?php echo $key?>" seleted=""><?php echo $value;?></option>
                   <?php else:?>
                   <option value="<?php echo $key?>"><?php echo $value;?></option>
                   <?php endif;?>
                   <?php endforeach;?>
                </select>
            </div>
        </div>

         <div class=" col-lg-offset-2 col-lg-8">
         <hr>
          <div class="row">
            <div class="col-lg-6">
                   <button type="submit" class="btn btn-sm bg-purple btn-block">SIMPAN</button>
            </div>
             <div class="col-lg-6">
                  <button type="button" onclick="return window.history.back();" class="btn btn-sm bg-purple btn-block btn-outline">BATAL</button>
             </div>
         </div>
       
        </div>

    </div>
</div>


<?php echo form_close()?>