# Tabel Pengujian Praktikum Pertemuan 11

**Course CRUD Lanjutan (Show, Form Request, Edit/Update, Delete) - Proyek KursusKu**

Nama: [yulia zikra] | NIM: [2524244] | Kelas: [ptik 5G] | Pemrograman Web III

| No. | Skenario Pengujian | Data Uji | Hasil yang Diharapkan | Actual (Hasil Nyata) | Status | Bukti |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | Menambah kursus valid | Semua data valid | Kursus berhasil ditambahkan | Data tersimpan di database, muncul pesan sukses hijau, dan redirect ke halaman daftar. | **Pass** | - |
| 2 | Kode kursus duplikat | Kode yang sudah ada (WEB-101) | Validasi menolak data | Ditolak; pesan "The code has already been taken." tampil di bawah field Kode. | **Pass** | `04-validation-duplicate-code.png` |
| 3 | Nama kursus kosong | Nama dikosongkan | Validasi menolak data | Ditolak; pesan "The name field is required." tampil di bawah field Nama. | **Pass** | - |
| 4 | Biaya negatif | Fee = -1000 | Validasi menolak data | Ditolak; pesan "The fee must be at least 0." tampil di bawah field Biaya. | **Pass** | - |
| 5 | Kuota melebihi batas | Quota = 501 | Validasi menolak data | Ditolak; pesan "The quota must be between 1 and 500." tampil di bawah field Kuota. | **Pass** | `05-validation-quota-501.png` |
| 6 | Menampilkan detail kursus | Klik tombol "Detail" | Halaman detail muncul | Halaman detail menampilkan semua informasi kursus dengan benar. | **Pass** | `02-course-show.png` |
| 7 | Membuka form edit | Klik tombol "Edit" | Form terisi data lama | Form muncul dengan semua field sudah terisi data dari database. | **Pass** | `03-course-edit.png` |
| 8 | Update dengan kode sendiri | Edit kursus tanpa ubah Kode | Berhasil disimpan | Data berhasil diperbarui; redirect ke detail dengan pesan sukses. | **Pass** | `06-update-success.png` |
| 9 | Update ke kode kursus lain | Ganti Kode jadi milik kursus lain | Validasi menolak (unique) | Ditolak; pesan "The code has already been taken." tampil. | **Pass** | - |
| 10 | Update normal | Ubah Nama, Biaya, Kuota | Berhasil disimpan | Data berhasil diperbarui; redirect ke detail dengan pesan sukses. | **Pass** | `06-update-success.png` |
| 11 | Menghapus kursus (Delete) | Hapus data dummy (DEL-001) | Data hilang dari index | Data dummy terhapus dari tabel; muncul pesan sukses hijau. | **Pass** | `07-delete-success.png` |
| 12 | Membatalkan hapus (Cancel) | Klik "Cancel" pada pop-up hapus | Data tidak jadi dihapus | Data dummy tetap ada di tabel (tidak terhapus). | **Pass** | - |

---

## Kesimpulan:
Seluruh pengujian manual untuk fitur CRUD Course (Create, Read, Update, Delete) dan validasi menggunakan Form Request berjalan dengan baik. Semua skenario yang diharapkan berhasil (Pass), dan pesan error/sukses tampil pada tempat yang tepat.