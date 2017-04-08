<script type="text/javascript">
$("input[id=telp_pengirim]").keyup(function(){
            var telp_pengirim = $(this).val(); 
            var nama_pengirim = $('input[id=nama_pengirim]');
            cek_customers(telp_pengirim,nama_pengirim);          
});

$("input[id=telp_penerima]").keyup(function(){
            var telp_penerima = $(this).val(); 
            var nama_penerima = $('input[id=nama_penerima]');
            cek_customers(telp_penerima,nama_penerima);          
});

$("select[id=jenis_barang]").ready(function() {
            var  jenis_barang = $(this).val();
            if(jenis_barang == null || jenis_barang == "")
            {
                  disable_all();
            }
}).change(function() {
            var  jenis_barang = $(this).val();
            if(jenis_barang == null || jenis_barang == "")
            {
                  disable_all();
            }else{

                  if(jenis_barang == 1){
                    focus_dokumen();
                    focus_biaya_dokumen();
                  }else if(jenis_barang == 2){
                    focus_barang();
                    focus_biaya_barang();
                  }else if (jenis_barang == 3) {
                    disable_all();
                  }
            }
});

$("input[name=tipe_count]").click(function() {
            var method = $(this).val();
            if(method == "weight_count")
            {
                $("#form-berat-kilogram").show();
                $("#form-hitung-volume").hide();
                $("#berat_kilogram").removeAttr('readonly', 'true');
                reset_hitung_kilogram();
            }else if (method == "volume_count") {
                $("#form-berat-kilogram").show();
                $("#form-hitung-volume").show();
                $("#berat_kilogram").attr('readonly', 'true');
                reset_hitung_kilogram();

            }
});


$(document).ready(function() {



  $("input[id=volume_lebar]").keypress(function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
      }
  });

  $("input[id=volume_panjang]").keypress(function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
      }
  });

  $("input[id=volume_tinggi]").keypress(function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
      }
  });

  $("input[id=jumlah_koli]").keypress(function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
      }
  });

  $("input[id=berat_kilogram]").keyup(function() {
            var biaya_awal = parseInt($("input[id=info_biaya]").val());
            var biaya_selanjutnya = parseInt($("input[id=info_biaya_selanjutnya]").val());
            var jumlah_kg = parseInt($(this).val());
            hitung_biaya_weight_proses(biaya_awal,biaya_selanjutnya,jumlah_kg);
  }).keypress(function(e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
          return false;
      }
  });
});



function hitung_biaya_weight() {
          var biaya_awal = parseInt($("input[id=info_biaya]").val());
          var biaya_selanjutnya = parseInt($("input[id=info_biaya_selanjutnya]").val());
          var jumlah_kg = parseInt($("input[id=berat_kilogram]").val());
          hitung_biaya_weight_proses(biaya_awal,biaya_selanjutnya,jumlah_kg);
}

function hitung_biaya_weight_proses(biaya_awal,biaya_selanjutnya,jumlah_kg) {

          if(jumlah_kg == 1){
            jumlah_kg_min = jumlah_kg - 1;
            biaya_lanjutan = biaya_selanjutnya * jumlah_kg_min;
            total = biaya_awal + biaya_lanjutan;
          }else if(jumlah_kg > 1){
            jumlah_kg_min = jumlah_kg -1;
            biaya_lanjutan = biaya_selanjutnya * jumlah_kg_min;
            total = biaya_awal + biaya_lanjutan;
          }else{
            total = "";
          }

          $("input[id=total_biaya]").val(total);


}




function reset_hitung_kilogram()
{
              var p = $("#volume_panjang").val('');
              var l = $("#volume_lebar").val('');
              var t = $("#volume_tinggi").val('');
              var berat_kilogram = $("#berat_kilogram").val('');
}
function hitung_kilogram()
{
              var p = $("#volume_panjang").val();
              var l = $("#volume_lebar").val();
              var t = $("#volume_tinggi").val();

              var total_kilo = p * l * t /4000;
              var grand_total_kilo = Math.ceil(total_kilo);

              $("#berat_kilogram").val(grand_total_kilo);
              hitung_biaya_weight();
}
function disable_all()
{
              $("#form-perhitungan").hide();
              $("#form-berat-kilogram").hide();
              $("#form-hitung-volume").hide();
              $("#jumlah_koli").attr('readonly', 'true');
              $("#berat_kilogram").attr('readonly', 'true');
              $("#ukuran_berat").attr('readonly', 'true');
              $("#jenis_layanan").attr('readonly', 'true');
              $("#metode_pembayaran").attr('readonly', 'true');
              $("#keterangan_pengiriman").attr('readonly', 'true');
              $("input[id=total_biaya]").val("");
              $("#berat_kilogram").val("");

}
function close_input() {

              var telp_pengirim       = $("input[id=telp_pengirim]").val("").attr('readonly', 'value');
              var nama_pengirim       = $("input[id=nama_pengirim]").val("").attr('readonly', 'value');
              var alamat_pengirim     = $("textarea[id=alamat_pengirim]").val("").attr('readonly', 'value');
              var telp_penerima       = $("input[id=telp_penerima]").val("").attr('readonly', 'value');
              var nama_penerima       = $("input[id=nama_penerima]").val("").attr('readonly', 'value');
              var alamat_penerima     = $("textarea[id=alamat_penerima]").val("").attr('readonly', 'value');
              var collapse_out        = $("div.panel-collapse").removeClass('in');
              var removeButton        = $("div#simpan_form").hide();
              var disable_jenis_paket = $("div#jenis_paket_barang").hide();
              var biaya_awal          = $("input[id=info_biaya]").val("");
              var biaya_selanjutnya   = $("input[id=info_biaya_selanjutnya]").val("");
              var keterangan_pengiriman = $("input[id=keterangan_pengiriman]").val("");
              var total_biaya           = $("input[id=total_biaya]").val("");
              var berat_kilogram        = $("input[id=berat_kilogram]").val("");
              var jumlah_koli           = $("input[id=jumlah_koli]").val("");
              var reset_jenis_paket     = $("select[id=jenis_barang]").val("");
              disable_all();
}

function open_input() {

              var telp_pengirim       = $("input[id=telp_pengirim]").val("").removeAttr('readonly', 'value');
              var nama_pengirim       = $("input[id=nama_pengirim]").val("").removeAttr('readonly', 'value');
              var alamat_pengirim     = $("textarea[id=alamat_pengirim]").val("").removeAttr('readonly', 'value');
              var telp_penerima       = $("input[id=telp_penerima]").val("").removeAttr('readonly', 'value');
              var nama_penerima       = $("input[id=nama_penerima]").val("").removeAttr('readonly', 'value');
              var alamat_penerima     = $("textarea[id=alamat_penerima]").val("").removeAttr('readonly', 'value');
              var collapse_out          = $("div.panel-collapse").removeClass('in');
              var addingButton          = $("div#simpan_form").show(0);
              var enable_jenis_paket    = $("div#jenis_paket_barang").show(0);
              var reset_jenis_paket     = $("select[id=jenis_barang]").val("");
              disable_all();
}
function focus_dokumen()
{
              $("#form-perhitungan").show(0);
              $("#form-berat-kilogram").show(0);
              $("#form-hitung-volume").hide();
              $("#jumlah_koli").removeAttr('readonly', 'true');
              $("input#weight_count").prop("checked", true);
              $("input[id=volume_count]").removeAttr('checked', 'true');
              $("input[id=volume_count]").attr('disabled', 'true');
              $("#berat_kilogram").removeAttr('readonly', 'true');
              $("input[id=total_biaya]").val("");
              $("#berat_kilogram").val("");
              $("#ukuran_berat").removeAttr('readonly', 'true');
              $("#jenis_layanan").removeAttr('readonly', 'true');
              $("#metode_pembayaran").removeAttr('readonly', 'true');
              $("#keterangan_pengiriman").removeAttr('readonly', 'true');
}

function focus_barang()
{
            $("#form-perhitungan").show(0);
            $("#form-berat-kilogram").show(0);
            $("#form-hitung-volume").hide();
            $("#jumlah_koli").removeAttr('readonly', 'true');
            $("input#weight_count").prop("checked", true);
            $("input[id=volume_count]").removeAttr('checked', 'true');
            $("input[id=volume_count]").removeAttr('disabled', 'true');
            $("#berat_kilogram").removeAttr('readonly', 'true');
            $("input[id=total_biaya]").val("");
            $("#berat_kilogram").val("");
            $("#ukuran_berat").removeAttr('readonly', 'true');
            $("#jenis_layanan").removeAttr('readonly', 'true');
            $("#metode_pembayaran").removeAttr('readonly', 'true');
            $("#keterangan_pengiriman").removeAttr('readonly', 'true');
}

function focus_bagasi()
{

}
function info_detail() {
            $("#info_jadwal").toggle();
}

function focus_biaya_dokumen()
{
            var biaya_awal = $("input[id=harga_dokument_kg_pertama]").val();
            var biaya_selanjutnya = $("input[id=harga_dokument_kg_selanjutnya]").val();
            $("input[id=info_biaya]").val(biaya_awal);
            $("input[id=info_biaya_selanjutnya]").val(biaya_selanjutnya);

}

function focus_biaya_barang() {
            var biaya_awal = $("input[id=harga_barang_kg_pertama]").val();
            var biaya_selanjutnya = $("input[id=harga_barang_kg_selanjutnya]").val();
            $("input[id=info_biaya]").val(biaya_awal);
            $("input[id=info_biaya_selanjutnya]").val(biaya_selanjutnya);
}


function validasi(e,text)
{
            if(e == null || e == ""){
              popup("Lengkapi Data "+text+"");
              return die();
            }else{
              return e;
            }
}


function booking()
{

                      var kode_manifest         = $("input[id=kode_manifest]").val();
                      var kode_jadwal           = $("input[id=kode_jadwal]").val();
                      var point_berangkat       = $("input[id=point_berangkat]").val();
                      var tujuan_berangkat      = $("input[id=tujuan_berangkat]").val();
                      var kode_atr              = $("input[id=kode_atr]").val();
                      var jam                   = $("input[id=jam]").val();
                      var cso                   = $("input[id=uuid_cso]").val();
                      var tanggal_keberangkatan = $("input[id=tanggal_keberangkatan]").val();

                      var telp_pengirim       = $("input[id=telp_pengirim]").val();
                      var nama_pengirim       = $("input[id=nama_pengirim]").val();
                      var alamat_pengirim     = $("textarea[id=alamat_pengirim]").val();
                      var telp_penerima       = $("input[id=telp_penerima]").val();
                      var nama_penerima       = $("input[id=nama_penerima]").val();
                      var alamat_penerima     = $("textarea[id=alamat_penerima]").val();

                      var keterangan_pengiriman   = $("input[id=keterangan_pengiriman]").val();
                      var metode_pembayaran       = $("select[id=metode_pembayaran]").val();
                      var jenis_layanan           = $("select[id=jenis_layanan]").val();
                      var ukuran_berat            = $("select[id=ukuran_berat]").val();
                      var jenis_barang            = $("select[id=jenis_barang]").val();
                      var info_biaya              = $("input[id=info_biaya]").val();
                      var info_biaya_selanjutnya  = $("input[id=info_biaya_selanjutnya]").val();
                      var total_biaya             = $("input[id=total_biaya]").val();
                      var berat_kilogram          = $("input[id=berat_kilogram]").val();
                      var jumlah_koli             = $("input[id=jumlah_koli]").val();
                      // ----------------------- VALIDASI --------------------------------- //

                      // ----------------------- DATA PENGIRIM ---------------------------- //

                      var nama_pengirim_valid     = validasi(nama_pengirim,'Nama Pengirim');
                      var telp_pengirim_valid     = validasi(telp_pengirim,'No Telp Pengirim');
                      var alamat_pengirim_valid   = validasi(alamat_pengirim,'Alamat Pengirim');
                      // ------------------------ DATA PENERIMA --------------------------- //
                      var nama_penerima_valid     = validasi(nama_penerima,'Nama Penerima');
                      var telp_penerima_valid     = validasi(telp_penerima,'No Telp Penerima');
                      var alamat_penerima_valid   = validasi(alamat_penerima,'Alamat Penerima');
                      //------------------------- DATA BARANG ------------------------------//
                      var jenis_barang_valid      = validasi(jenis_barang,'Jenis Barang');
                      var keterangan_pengiriman_valid   = keterangan_pengiriman;
                      var metode_pembayaran_valid = metode_pembayaran;
                      var jenis_layanan_valid     = validasi(jenis_layanan,"Jenis Layanan");
                      var ukuran_berat_valid      = validasi(ukuran_berat,'Ukuran Paket');
                      var info_biaya_valid        = validasi(info_biaya,'Biaya Paket');
                      var total_biaya_valid       = validasi(total_biaya,'Biaya Paket');
                      var berat_kilogram_valid    = validasi(berat_kilogram,'Berat Kilogram');
                      var jumlah_koli_valid       = validasi(jumlah_koli,'Jumlah Koli Paket');

                      var data = {
                          kode_manifest:kode_manifest,
                          kode_jadwal:kode_jadwal,
                          kode_atr:kode_atr,
                          point_berangkat:point_berangkat,
                          tujuan_berangkat:tujuan_berangkat,
                          jam:jam,
                          cso:cso,
                          tanggal_keberangkatan:tanggal_keberangkatan,
                          jenis_barang_valid:jenis_barang_valid,
                          keterangan_pengiriman_valid:keterangan_pengiriman_valid,
                          metode_pembayaran_valid:metode_pembayaran_valid,
                          jenis_layanan_valid:jenis_layanan_valid,
                          ukuran_berat_valid:ukuran_berat_valid,
                          info_biaya:info_biaya_valid,
                          info_biaya_selanjutnya:info_biaya_selanjutnya,
                          total_biaya_valid:total_biaya_valid,
                          berat_kilogram_valid:berat_kilogram_valid,
                          jumlah_koli_valid:jumlah_koli_valid,
                          telp_penerima_valid:telp_penerima_valid,
                          nama_penerima_valid:nama_penerima_valid,
                          alamat_penerima_valid:alamat_penerima_valid,
                          telp_pengirim_valid:telp_pengirim_valid,
                          nama_pengirim_valid:nama_pengirim_valid,
                          alamat_pengirim_valid:alamat_pengirim_valid,
                      }

                      cetak_tiket();


}

function detail_paket(nomor_resi_paket) {

                  var nomor_resi_paket = nomor_resi_paket;
                  $.ajax({
                    url: url_control+'/reservasi_cargo/detail_paket',
                    type: 'POST',
                    dataType: 'html',
                    data: {nomor_resi_paket:nomor_resi_paket},
                    beforeSend:function(){ $(".loading").show();},
                    success:function(result){
                      $(".loading").hide();
                      $("div#panel-input-paket").hide(0);
                      $("div#panel-detail-paket").show(0);
                      $("div#panel-detail-paket").html(result);
                    },
                  });
}
function tutup_informasi() {
                $("div#panel-input-paket").show(0);
                $("div#panel-detail-paket").hide(0);
}

function batalkan_tiket(nomor_resi_paket) {
                var nomor_resi_paket = nomor_resi_paket;
                swal({
                title: "BATALKAN PAKET",
                text: "Apakah anda yakin ingin membatalkan resi tiket ini? \n "+nomor_resi_paket+"",
                imageUrl: "<?php echo base_url()?>assets/icons/icon-pembatalan-paket.svg",
                showCancelButton: true,
                confirmButtonColor: "#FF9900",
                confirmButtonText: "Confirm",
                closeOnConfirm: false
                },
                function(){
                  swal("Dibatalkan!", "Kode tiket berhasil di batalkan", "success");
                  batalkan_tiket_proses(nomor_resi_paket);
                });
}

function batalkan_tiket_proses(nomor_resi_paket) {
              $.ajax({
                url: url_control+'/reservasi_cargo/pembatalan_paket',
                type: 'POST',
                dataType: 'html',
                data: {nomor_resi_paket:nomor_resi_paket},
                success:function(result)
                {
                    if(result == "success"){
                      popup("Berhasil Melakukan Pembatalan");
                      resfresh_jadwal();
                    }else{
                      popup("Gagal Melakukan Pembatalan Paket");
                      resfresh_jadwal();
                    }
                }
              });

}

function popup_metode_pembayaran() {

              $(".cetak_tiket").show();
              $("#modal-cetak-tiket").modal("show");
}

function non_popup_method_pembayaran(){

              $(".cetak_tiket").hide();
              $("#modal-cetak-tiket").modal("hide");
}
function cetak_tiket() {
              popup_metode_pembayaran();
}

function popup_open_manifest() {
              $(".manifest").show();
              $("#modal-cetak-manifest").modal('show');
}
function popup_close_manifest(){
              $(".manifest").hide();
              $("#modal-cetak-manifest").modal('hide');
}
function cetak_manifest() {
              popup_open_manifest();
}
function cek_customers(nomor,nama)
{
            $.ajax({
              url:url_control+'/reservasi_cargo/check_customers',
              type:'POST',
              cache:false,
              data:{nomor:nomor},
              success:function(result)
              {
                var object = $.parseJSON(result);
                nama.val(object.nama_customers);    
              }
            });
}

function booking_pengiriman_barang(jenis_layanan_pembayaran)
{

            var kode_manifest         = $("input[id=kode_manifest]").val();
                      var kode_jadwal           = $("input[id=kode_jadwal]").val();
                      var point_berangkat       = $("input[id=point_berangkat]").val();
                      var tujuan_berangkat      = $("input[id=tujuan_berangkat]").val();
                      var kode_atr              = $("input[id=kode_atr]").val();
                      var jam                   = $("input[id=jam]").val();
                      var cso                   = $("input[id=uuid_cso]").val();
                      var tanggal_keberangkatan = $("input[id=tanggal_keberangkatan]").val();

                      var telp_pengirim       = $("input[id=telp_pengirim]").val();
                      var nama_pengirim       = $("input[id=nama_pengirim]").val();
                      var alamat_pengirim     = $("textarea[id=alamat_pengirim]").val();
                      var telp_penerima       = $("input[id=telp_penerima]").val();
                      var nama_penerima       = $("input[id=nama_penerima]").val();
                      var alamat_penerima     = $("textarea[id=alamat_penerima]").val();

                      var keterangan_pengiriman   = $("input[id=keterangan_pengiriman]").val();
                      var metode_pembayaran       = $("select[id=metode_pembayaran]").val();
                      var jenis_layanan           = $("select[id=jenis_layanan]").val();
                      var ukuran_berat            = $("select[id=ukuran_berat]").val();
                      var jenis_barang            = $("select[id=jenis_barang]").val();
                      var info_biaya              = $("input[id=info_biaya]").val();
                      var info_biaya_selanjutnya  = $("input[id=info_biaya_selanjutnya]").val();
                      var total_biaya             = $("input[id=total_biaya]").val();
                      var berat_kilogram          = $("input[id=berat_kilogram]").val();
                      var jumlah_koli             = $("input[id=jumlah_koli]").val();
                      // ----------------------- VALIDASI --------------------------------- //

                      // ----------------------- DATA PENGIRIM ---------------------------- //

                      var nama_pengirim_valid     = validasi(nama_pengirim,'Nama Pengirim');
                      var telp_pengirim_valid     = validasi(telp_pengirim,'No Telp Pengirim');
                      var alamat_pengirim_valid   = validasi(alamat_pengirim,'Alamat Pengirim');
                      // ------------------------ DATA PENERIMA --------------------------- //
                      var nama_penerima_valid     = validasi(nama_penerima,'Nama Penerima');
                      var telp_penerima_valid     = validasi(telp_penerima,'No Telp Penerima');
                      var alamat_penerima_valid   = validasi(alamat_penerima,'Alamat Penerima');
                      //------------------------- DATA BARANG ------------------------------//
                      var jenis_barang_valid      = validasi(jenis_barang,'Jenis Barang');
                      var keterangan_pengiriman_valid   = keterangan_pengiriman;
                      var metode_pembayaran_valid = metode_pembayaran;
                      var jenis_layanan_valid     = validasi(jenis_layanan,"Jenis Layanan");
                      var ukuran_berat_valid      = validasi(ukuran_berat,'Ukuran Paket');
                      var info_biaya_valid        = validasi(info_biaya,'Biaya Paket');
                      var total_biaya_valid       = validasi(total_biaya,'Biaya Paket');
                      var berat_kilogram_valid    = validasi(berat_kilogram,'Berat Kilogram');
                      var jumlah_koli_valid       = validasi(jumlah_koli,'Jumlah Koli Paket');

                      var send = {
                          kode_manifest:kode_manifest,
                          kode_jadwal:kode_jadwal,
                          kode_atr:kode_atr,
                          point_berangkat:point_berangkat,
                          tujuan_berangkat:tujuan_berangkat,
                          jam:jam,
                          cso:cso,
                          tanggal_keberangkatan:tanggal_keberangkatan,
                          jenis_barang_valid:jenis_barang_valid,
                          keterangan_pengiriman_valid:keterangan_pengiriman_valid,
                          metode_pembayaran_valid:metode_pembayaran_valid,
                          jenis_layanan_valid:jenis_layanan_valid,
                          ukuran_berat_valid:ukuran_berat_valid,
                          info_biaya:info_biaya_valid,
                          info_biaya_selanjutnya:info_biaya_selanjutnya,
                          total_biaya_valid:total_biaya_valid,
                          berat_kilogram_valid:berat_kilogram_valid,
                          jumlah_koli_valid:jumlah_koli_valid,
                          telp_penerima_valid:telp_penerima_valid,
                          nama_penerima_valid:nama_penerima_valid,
                          alamat_penerima_valid:alamat_penerima_valid,
                          telp_pengirim_valid:telp_pengirim_valid,
                          nama_pengirim_valid:nama_pengirim_valid,
                          alamat_pengirim_valid:alamat_pengirim_valid,
                          jenis_layanan_pembayaran:jenis_layanan_pembayaran,
                      }
          $.ajax({
              url:url_control+'/reservasi_booking/booking_add',
              type:'POST',
              cache:false,
              data:send,
              success:function(result)
              {
                     if(result == 'success'){
                       non_popup_method_pembayaran();
                       popup("Berhasil Menyimpan Data");
                     }else{
                       non_popup_method_pembayaran();
                       popup("Gagal Menyimpan Data");
                     }
              }
          })
}


</script>
