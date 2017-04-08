<script type="text/javascript">

    $(document).ready(function() {

    });

    function simpan_transaksi()
    {
            var total_biaya = $("span[id=total_biaya]").text();
            if(total_biaya > 0)
            {
                  var customer = cek_daftar_customer();
                  console.log(customer);
            }
    }

    function cek_daftar_customer() {

            var kode_member = $("input[id=kode_member]").val();
            var nomor_handphone = $("input[id=nomor_handphone]").val();
            var nama_pelanggan = $("input[id=nama_customer]").val();

            // if(kode_member == null || kode_member == "")
            // {
            //       popup
            // }

            var data = {
              kode_member:kode_member,
              nomor_handphone:nomor_handphone,
              nama_pelanggan:nama_pelanggan,
            }

            return data;
    }
</script>
