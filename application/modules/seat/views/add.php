<?php
$form = array(
    'onSubmit'=>'return validasi()',
    'method'=>'POST',
);

echo form_open('seat/insert');
?>


<div class="form-horizontal">
    <div class="col-lg-offset-2 col-lg-8">
        
        <div class="form-group">
            <label class="control-label col-lg-4">Type Kelas :</label>
            <div class="col-lg-6">
                <input type="text" name="" value="" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Jumlah Seat :</label>
            <div class="col-lg-6">
                <input type="text" name="" value="" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Jumlah Block :</label>
            <div class="col-lg-6">
                <input type="text" name="" value="" class="form-control">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-4">Type Layout :</label>
            <div class="col-lg-6">
                <select class="form-control input-sm">
                    <option value="col-lg-3">KOLOM 3</option>
                    <option value="col-lg-2">KOLOM 4</option>
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