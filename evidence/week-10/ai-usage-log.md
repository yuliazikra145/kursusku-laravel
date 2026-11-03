# Log Penggunaan AI (AI Usage Log)
**Pertemuan 10 - Database & CRUD I (Create + Read)**

| Waktu | Masalah / Tujuan | Prompt Singkat | Saran AI yang Diterima | Saran AI yang Ditolak | Verifikasi / Test |
| :--- | :--- | :--- | :--- | :--- | :--- |
| 03/11/2026 | Membuat file Migration | "Buatkan kode migration untuk tabel courses dengan field code, name, description, fee, quota, start_date, status." | Menggunakan `$table->string('code', 20)->unique();` untuk mencegah duplikasi. | - | Berhasil dijalankan via route `/migrate-paksa`. |
| 03/11/2026 | Error `Class "App\Models\Course" not found` | "Kenapa Laravel tidak menemukan class Course padahal file sudah dibuat?" | Memastikan file `Course.php` berada di dalam folder `app/Models/` dan namespace-nya benar. | - | Error hilang setelah file dipindahkan ke folder yang tepat. |
| 03/11/2026 | Error `Class "App\Http\Requests\StoreCourseRequest" does not exist` | "Kenapa muncul error StoreCourseRequest saat klik simpan?" | Mengganti isi `CourseController.php` dengan validasi langsung di dalam method `store()` (tanpa Form Request) sesuai panduan praktikum. | Saran untuk membuat file Form Request baru. | Form berhasil menyimpan data (WEB-101) dan muncul pesan sukses. |
| 03/11/2026 | Membersihkan cache Laravel | "Terminal Cmder tidak bisa menjalankan php artisan, bagaimana cara clear cache?" | Membuat route sementara `/clear-cache` di `routes/web.php` untuk memanggil `Artisan::call()`. | - | Cache berhasil dibersihkan dan error hilang. |

## Kesimpulan:
AI digunakan sebagai *tutor* untuk membantu *debugging* error (seperti *Class not found* dan masalah terminal). Semua kode yang disarankan AI telah diuji secara manual di browser dan berjalan sesuai harapan. Mahasiswa memahami alur dari Route -> Controller -> Model -> Database -> View.