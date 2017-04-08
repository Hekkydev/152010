<?php
// ---------------KODE MANIFEST------------------------------------//
if(!function_exists('kode_manifest')):
  function kode_manifest($post_array)
  {
        $jadwal = kode_manifest_valid($post_array);
        return $jadwal;
  }
endif;

if(!function_exists('kode_manifest_valid')):
  function kode_manifest_valid($post_array)
  {


      $result = $post_array;
      $jadwal = jadwal_init($result->kode_jadwal);
      // -----------------------------------------
      $jadwal_err = (object) array(
        'jam'=>'',
        'menit'=>'',
        'id_jadwal'=>'',
        'tgl_berangkat'=>'',
      );
      try {
        if($jadwal != TRUE) throw new Exception($jadwal_err);

        $jam        = $jadwal->jam;
        $menit      = $jadwal->menit;
        $id_jadwal  = $jadwal->id_jadwal;

            $date       = date_create($result->tgl_berangkat);
            $tanggal    = date_format($date,"ymd");
            $kode_cabang = kode_cabang($result->asal_keberangkatan);

        $kode_manifest = "MNF".$kode_cabang.$tanggal."-".$id_jadwal.'-'.$jam.$menit;
        return $kode_manifest;
      } catch (Exception $e) {

        $kode_manifest = "MNF"."error";
        return $kode_manifest;
      }

  }
endif;
