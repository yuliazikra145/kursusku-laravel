# Test Matrix Week 10 - CRUD Kursus (Create + Read)

Berikut adalah hasil pengujian manual untuk Milestone 10 menggunakan database MySQL Laravel.

| No | Skenario | Input Utama | Hasil yang Diharapkan | Status | Catatan Aktual |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | Simpan data valid | Semua field valid (WEB-101) | Data tersimpan, redirect ke index, pesan sukses | [x] Lulus | Berhasil, muncul pesan hijau "Kursus berhasil ditambahkan." |
| 2 | Kode kosong | `code` kosong | Validasi gagal, data tidak tersimpan | [x] Lulus | Muncul pesan merah "The code field is required." |
| 3 | Kode duplikat | `code` = WEB-101 (kedua kali) | Ditolak oleh rule unique | [x] Lulus | Muncul pesan "The code has already been taken." |
| 4 | Nama kosong | `name` kosong | Validasi gagal | [x] Lulus | Muncul pesan merah "The name field is required." |
| 5 | Biaya negatif | `fee` = -1000 | Ditolak karena min:0 | [x] Lulus | Muncul pesan "The fee must be at least 0." |
| 6 | Kuota 0 | `quota` = 0 | Ditolak karena min:1 | [x] Lulus | Muncul pesan "The quota must be at least 1." |
| 7 | Status tidak valid | `status` = active | Ditolak karena hanya draft/open/closed | [x] Lulus | Muncul pesan error validasi status. |
| 8 | Daftar tampil ulang | Reload `/courses` | Data tetap ada karena berasal dari MySQL | [x] Lulus | 8 data berhasil ditampilkan dari database. |

## Catatan Tambahan:
- Semua form berhasil disubmit menggunakan tombol "Simpan Kursus".
- Pesan error validasi tampil tepat di bawah field yang salah (menggunakan `@error`).
- Pengujian dilakukan di browser Chrome dengan URL `http://kursusku.test/courses`.