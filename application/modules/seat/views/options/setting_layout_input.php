<form action="<?php echo site_url('seat/konfigurasi_block')?>" method="post">

       <input type="hidden" name="sid" value="<?php echo $setting->id_jml_kursi; ?>" class="form-control">

    <div class="form-group">
       <label for="">Kondisi</label>
       <select class="form-control" name="id_status">
           <option value="1">Aktif</option>
           <option value="2">Non AKtif</option>
       </select>
    </div>
     <div class="form-group">
       <label for="">Blok Pilihan:</label>
       <input type="text" name="nomor_layout" value="<?php echo $setting->nomor_pilihan; ?>" min="0"  class="form-control" readonly="readonly">
    </div>
      <div class="form-group">
       <label for="">Nomor yang di tetapkan:</label>
       <input type="number" name="nomor_kursi" min="0" class="form-control" value="<?php echo $setting->nomor_pilihan; ?>">
    </div>

    <div class="form-group">
        <ul class="dropdown">
            <li>Tetapkan Nomor 0 Untuk Sopir dan hanya boleh memilih satu</li>
            <br>
            <li>Nonaktifkan Kondisi Untuk Mengosongkan Block</li>
        </ul>
    </div>
    <hr>
    <div class="form-group">
        <button type="submit" class="btn btn-xs bg-purple">SIMPAN</button>
        <button type="button" class="btn btn-xs bg-red">BATAL</button>
    </div>
</form>