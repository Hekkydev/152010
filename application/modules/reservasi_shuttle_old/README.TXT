Informasi Module Reservasi Reguler Shuttle

Update Version 1 -------------------------------------------------
1. penambahan fungsi pada file script.php
    - perubahan pada  fungsi booking dengan menambahkan validasi input jika data nomor handphone dan nama_penumpang
      kosong dengan penambahan has-error

2. penambahan fungsi pada file detail_kursi.php
    - perubahan fungsi getDetailPenumpang(kode_booking)
    - penambahan cek_harga_penumpang(tipe_penumpang)
    - penambahan batalkan_tiket()
    - penambahan batalkan_tiket_proses()

3. perubahan layout_kursi/layout_8.php
    - penambahan helper berdasarkan reservasi_helper

4. perubahan tampilan menu pada file menu operasional
    - perubahan directory dan penambahan beberapa link

5. perubahan file view customer detail_customer
    - membuat function mutasi()
    - membuat function  update_penumpang_detail()


kekurangan :
- belum semua layout kursi di tambahkan validasi helper
- fungsi mutasi() belum berjalan
- fungsi update_penumpang_detail() belum berjalan
-------------------------------------------------------------------






Update Version 2 --------------------------------------------------
1. perubahan fungsi pada script.php
    - penambahan function mutasi()
    - penambahan function mutasi_pilih_kursi()
    - penambahan function mutasi_proses
    - penambahan fugsi each pada mode mutasi sesuai dengan kondisi yang di klik
    -
2. penambahan fungsi pada controller reservasi dengan menambahkan mode mutasi penumpang

kekurangan :
- belum semua layout kursi di tambahkan validasi helper
- fungsi mutasi() belum berjalan
- fungsi update_penumpang_detail() belum berjalan
-------------------------------------------------------------------


Update Version 3 --------------------------------------------------
1. Perubahan directory secara menyeluruh
2. Koreksi fungsi fungsi javascript dan controller
