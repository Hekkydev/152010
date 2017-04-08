function last_version_1()
{

    if($this->input->post('simpan') == TRUE):
      //konfirmasi apabila button simpan benar

        // input biaya jurusan
        $kode_jurusan = $this->input->post('kode_jurusan');
        $kode_atr = $this->input->post('kode_atr');
        $asal_keberangkatan = $this->input->post('asal_keberangkatan');
        $tujuan_keberangkatan = $this->input->post('tujuan_keberangkatan');
        $id_status = $this->input->post('id_status');
        $id_master_jenis_jurusan = $this->input->post('id_master_jenis_jurusan');
        $id_master_jenis_operasional = $this->input->post('id_master_jenis_operasional');

        // input biaya operasional
        $biaya_tol = $this->input->post('biaya_tol');
        $biaya_sopir = $this->input->post('biaya_sopir');
        $biaya_parkir = $this->input->post('biaya_parkir');
        $biaya_bbm  = $this->input->post('biaya_bbm');

        if($id_master_jenis_jurusan == TRUE):

              $data_jurusan = array(
                'kode_jurusan'=>$kode_jurusan,
                'kode_atr'=>$kode_atr,
                'asal_keberangkatan'=>$asal_keberangkatan,
                'tujuan_keberangkatan'=>$tujuan_keberangkatan,
                'id_status'=>$id_status,
                'id_master_jenis_jurusan'=>$id_master_jenis_jurusan,
                'id_master_jenis_operasional'=>$id_master_jenis_operasional,
                'created_date'=>$this->waktu_skr,
              );

              $data_biaya_operasional = array(
                'kode_jurusan'=>$kode_jurusan,
                'biaya_tol'=>$biaya_tol,
                'biaya_sopir'=>$biaya_sopir,
                'biaya_parkir'=>$biaya_parkir,
                'biaya_bbm'=>$biaya_bbm,
                'created_date'=>$this->waktu_skr,
              );

              $cek_kode_jurusan = $this->jurusan_model->getKode($kode_jurusan);
              if($cek_kode_jurusan == NULL):

                foreach($this->KursiMobil as $km):
                    $data_liter = array(
                      'kode_jurusan'=>$kode_jurusan,
                      'id_jml_kursi'=>$km->id_jml_kursi,
                      'total_liter'=>$this->input->post('jml-'.$km->id_jml_kursi),
                      'created_date'=>$this->waktu_skr,
                    );
                    $insert_liter_bbm = $this->jurusan_model->insert_liter_bbm($data_liter);

                endforeach;

              // penentuan jenis operasional non_reguler
              if($id_master_jenis_operasional == 1):
                                $data_non_reguler = array(
                                    'kode_jurusan'=>$kode_jurusan,
                                    'harga_tiket_1'=>$this->input->post('harga_tiket_1'),
                                    'harga_tiket_2'=>$this->input->post('harga_tiket_2'),
                                    'harga_tiket_3'=>$this->input->post('harga_tiket_3'),
                                    'harga_tiket_4'=>$this->input->post('harga_tiket_4'),
                                    'created_date'=>$this->waktu_skr,
                                  );
                                  // simpan data non reguler
                                  $simpan_data_non_reguler = $this->jurusan_model->non_reguler_insert($data_jurusan,$data_biaya_operasional,$data_non_reguler);
                                  if($simpan_data_non_reguler == TRUE):
                                      $this->AlertRequest("Jurusan","add");
                                      redirect($this->jurusan_add);
                                  endif;

              // penentuan jenis operasional reguler tiket
              elseif($id_master_jenis_operasional == 2):

                                  foreach($this->KursiMobil as $km):
                                       $data_reguler_tiket = array(
                                        'kode_jurusan'=>$kode_jurusan,
                                        'id_jml_kursi'=>$km->id_jml_kursi,
                                        'umum'=>$this->input->post('umum_'.$km->id_jml_kursi.''),
                                        'mahasiswa'=>$this->input->post('mahasiswa_'.$km->id_jml_kursi.''),
                                        'promo'=>$this->input->post('promo_'.$km->id_jml_kursi.''),
                                        'created_date'=>$this->waktu_skr,
                                      );
                                      $simpan_data_reguler_tiket = $this->jurusan_model->reguler_tiket_insert_tiketing($data_reguler_tiket);
                                  endforeach;

                                  $insert_reguler_tiket = $this->jurusan_model->reguler_tiket_insert_jurusan($data_jurusan,$data_biaya_operasional);
                                  if($insert_reguler_tiket== TRUE):
                                        $this->AlertRequest("Jurusan","add");
                                        redirect($this->jurusan_add);
                                  endif;

              // penentuan jenis operasional cargo
              elseif($id_master_jenis_operasional == 3):

                                  $data_reguler_cargo = array(
                                    'kode_jurusan'=>$kode_jurusan,
                                    'harga_dokument_kg_pertama'=>$this->input->post('harga_dokument_kg_pertama'),
                                    'harga_dokument_kg_selanjutnya'=>$this->input->post('harga_dokument_kg_selanjutnya'),
                                    'harga_barang_kg_pertama'=>$this->input->post('harga_barang_kg_pertama'),
                                    'harga_barang_kg_selanjutnya'=>$this->input->post('harga_barang_kg_selanjutnya'),
                                    'harga_charge_bagasi_kg_pertama'=>$this->input->post('harga_charge_bagasi_kg_pertama'),
                                    'harga_charge_bagasi_kg_selanjutnya'=>$this->input->post('harga_charge_bagasi_kg_selanjutnya'),
                                    'created_date'=>$this->waktu_skr,
                                  );

                                  $simpan_data_paket = $this->jurusan_model->cargo_reguler_insert($data_jurusan,$data_biaya_operasional,$data_reguler_cargo);
                                  if($simpan_data_paket == TRUE):
                                      $this->AlertRequest("Jurusan","add");
                                      redirect($this->jurusan_add);
                                  endif;
              // penentuan jenis operasional tiket dan cargo
              elseif($id_master_jenis_operasional == 4):

                                  foreach($this->KursiMobil as $km):
                                      $data_reguler_tiket = array(
                                        'kode_jurusan'=>$kode_jurusan,
                                        'id_jml_kursi'=>$km->id_jml_kursi,
                                        'umum'=>$this->input->post('umum_'.$km->id_jml_kursi.''),
                                        'mahasiswa'=>$this->input->post('mahasiswa_'.$km->id_jml_kursi.''),
                    'promo'=>$this->input->post('promo_'.$km->id_jml_kursi.''),
                                        'created_date'=>$this->waktu_skr,
                                      );
                                      $simpan_data_reguler_tiket = $this->jurusan_model->reguler_tiket_insert_tiketing($data_reguler_tiket);
                                  endforeach;

                                    $data_reguler_cargo = array(
                                      'kode_jurusan'=>$kode_jurusan,
                                      'harga_dokument_kg_pertama'=>$this->input->post('harga_dokument_kg_pertama'),
                                      'harga_dokument_kg_selanjutnya'=>$this->input->post('harga_dokument_kg_selanjutnya'),
                                      'harga_barang_kg_pertama'=>$this->input->post('harga_barang_kg_pertama'),
                                      'harga_barang_kg_selanjutnya'=>$this->input->post('harga_barang_kg_selanjutnya'),
                                      'harga_charge_bagasi_kg_pertama'=>$this->input->post('harga_charge_bagasi_kg_pertama'),
                                      'harga_charge_bagasi_kg_selanjutnya'=>$this->input->post('harga_charge_bagasi_kg_selanjutnya'),
                                      'created_date'=>$this->waktu_skr,
                                    );

                                    $simpan_data_paket = $this->jurusan_model->cargo_reguler_insert($data_jurusan,$data_biaya_operasional,$data_reguler_cargo);
                                    if($simpan_data_paket == TRUE):
                                        $this->AlertRequest("Jurusan","add");
                                        redirect($this->jurusan_add);
                                    endif;


              // penentuan jenis operasional carter
              elseif($id_master_jenis_operasional == 5):

                                  $data_carter = array(
                                    'kode_jurusan'=>$kode_jurusan,
                                    'created_date'=>$this->waktu_skr,
                                  );
                                  $insert_charter = $this->jurusan_model->insert_carter($data_carter);
                                  $insert_charter_jurusan = $this->jurusan_model->reguler_tiket_insert_jurusan($data_jurusan,$data_biaya_operasional);
                                  if($insert_charter_jurusan == TRUE):
                                      $this->AlertRequest("Jurusan","add");
                                      redirect($this->jurusan_add);
                                  endif;
              //----------------akhir--------------------------------------------------------------------------------
              //membuat fungsi elseif baru jika ada penambahan operasional karena bersifat statis

              endif;
            else:

              $this->AlertRequest("Buat Kode Jurusan Lain dan tidak boleh sama seperti sebelumnya","error");
              redirect($this->jurusan_add,'refresh');

            endif;


        else:
            $this->AlertRequest("Data Tidak Valid","confirm");
            redirect($this->jurusan_add,'refresh');
        endif;

    else:
      // jika tidak berdsarkan button simpan maka akan reload ke tambah jurusan
      $this->AlertRequest("Data Tidak Valid","confirm");
      redirect($this->jurusan_add,'refresh');
    endif;
}
