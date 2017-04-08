<?php

if (!function_exists('berhasil_menyimpan')) {
    function berhasil_menyimpan($title){
      return $data = '
      <script>
      $(document).ready(function()
      {
        swal({
          title: "Berhasil Menyimpan",
          text: "Data '.$title.' berhasil ditambahkan !",
          timer: 4000,
          showConfirmButton: false
        });
      });
      </script>
      ';
    }
}


if (!function_exists('berhasil_mengupdate')) {
    function berhasil_mengupdate($title){
      return $data = '
      <script>
      $(document).ready(function()
      {
        swal({
          title: "Update Berhasil",
          text: "Data '.$title.' berhasil diupdate !",
          timer: 4000,
          showConfirmButton: false
        });
      });
      </script>
      ';
    }
}

if (!function_exists('berhasil_menghapus')) {
    function berhasil_menghapus($title){
      return $data = '
      <script>
      $(document).ready(function()
      {
        swal({
          title: "Delete Berhasil",
          text: "Data '.$title.' berhasil dihapus !",
          timer: 4000,
          showConfirmButton: false
        });
      });
      </script>
      ';
    }
}


if (!function_exists('berhasil_mengkonfirmasi')):
    function berhasil_mengkonfirmasi($title){
      return $data = '
      <script>
      $(document).ready(function()
      {
        swal({
          title: "Informasi",
          text: "'.$title.'",
          timer: 4000,
          showConfirmButton: false
        });
      });
      </script>
      ';
    }
endif;

if (!function_exists('error_konfirmasi')):
    function error_konfirmasi($title){
      return $data = '
      <script>
      $(document).ready(function()
      {
        swal("ERROR!", "'.$title.'", "error");
      });
      </script>
      ';
    }
endif;
