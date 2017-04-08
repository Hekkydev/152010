<script>
  function validasi()
  {
    var no_reg = document.forms['form-user']['no_reg'].value;
    var no_ktp = document.forms['form-user']['no_ktp'].value;
    var nama_lengkap = document.forms['form-user']['nama_lengkap'].value;
    var email = document.forms['form-user']['email'].value;
    if(no_reg == null || no_reg == "" )

    {
        popup("Lengkapi nomor registrasi karyawan");
        return false;
    }

    if(no_ktp == null || no_ktp == "")
    {
        popup("Lengkapi nomor KTP ");
        return false;
    }

    if(nama_lengkap == null || nama_lengkap == "")
    {
        popup("Lengkapi nama lengkap user");
        return false;
    }
    if(email == null || email == "")
    {
        popup("Lengkapi data email");
        return false;
    }


  }
</script>
