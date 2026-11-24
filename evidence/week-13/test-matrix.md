# Test Matrix Pertemuan 13 - Search, Filter, Pagination

| No | Skenario | Langkah | Expected | Status |
|:---|:---|:---|:---|:---|
| 1 | 0 hasil | Cari keyword "xyzabc" | Empty state tampil, tanpa error | PASS |
| 2 | 1 hasil | Cari keyword unik (misal: "Bootstrap") | Tepat 1 Course tampil | PASS |
| 3 | >10 hasil | Buka /courses | Page 1 max 10 + pagination | PASS |
| 4 | Keyword dengan spasi | Cari "Web Dasar" | Keyword terbaca benar | PASS |
| 5 | Filter + page 2 | Pilih status "Open", klik Next | q/status tetap terjaga di URL | PASS |