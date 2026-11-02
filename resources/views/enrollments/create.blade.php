@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6"> <!-- Kunci agar form rapi di tengah -->
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <h3 class="fw-bold mb-1">Mulai belajar bersama KursusKu</h3>
                    <p class="text-muted mb-4">Gunakan data latihan. Field bertanda wajib (*) harus diisi.</p>

                    <!-- Pesan Sukses -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('enrollments.preview') }}">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control bg-light @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap Anda" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control bg-light @error('email') is-invalid @enderror" placeholder="contoh@email.com" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Nomor HP *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control bg-light @error('phone') is-invalid @enderror" placeholder="Contoh: 081234567890" required>
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Program Studi -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Program Studi *</label>
                            <input type="text" name="prodi" value="{{ old('prodi') }}" class="form-control bg-light @error('prodi') is-invalid @enderror" placeholder="Masukkan program studi Anda" required>
                            @error('prodi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Pilih Kursus -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Pilih Kursus *</label>
                            <select name="course_id" id="course_id" class="form-select bg-light @error('course_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kursus --</option>
                                @foreach ($courses as $id => $course)
                                    <option value="{{ $id }}" @selected(old('course_id') == $id)>{{ $course['name'] }}</option>
                                @endforeach
                            </select>
                            @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            
                            <!-- Kotak Ajax -->
                            <div id="availability" class="alert alert-light border mt-2 py-2 px-3 text-muted" style="font-size: 14px;">
                                Pilih kursus untuk melihat sisa kursi.
                            </div>
                        </div>

                        <!-- Metode Belajar -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Metode Belajar *</label>
                            <select name="method" class="form-select bg-light @error('method') is-invalid @enderror" required>
                                <option value="">-- Pilih metode --</option>
                                <option value="Online" @selected(old('method') == 'Online')>Online</option>
                                <option value="Offline" @selected(old('method') == 'Offline')>Offline (Tatap Muka)</option>
                                <option value="Hybrid" @selected(old('method') == 'Hybrid')>Hybrid (Campuran)</option>
                            </select>
                            @error('method') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Jenis Peserta -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary d-block" style="font-size: 14px;">Jenis Peserta *</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="participant_type" value="Mahasiswa" @checked(old('participant_type') == 'Mahasiswa' || !old('participant_type')) required>
                                <label class="form-check-label" style="font-size: 14px;">Mahasiswa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="participant_type" value="Umum" @checked(old('participant_type') == 'Umum')>
                                <label class="form-check-label" style="font-size: 14px;">Umum</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="participant_type" value="Guru" @checked(old('participant_type') == 'Guru')>
                                <label class="form-check-label" style="font-size: 14px;">Guru</label>
                            </div>
                        </div>

                        <!-- Minat Tambahan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary d-block" style="font-size: 14px;">Minat Tambahan *</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="UI/UX">
                                <label class="form-check-label" style="font-size: 14px;">UI/UX</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Database">
                                <label class="form-check-label" style="font-size: 14px;">Database</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Backend">
                                <label class="form-check-label" style="font-size: 14px;">Backend</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="interests[]" value="Frontend">
                                <label class="form-check-label" style="font-size: 14px;">Frontend</label>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-secondary" style="font-size: 14px;">Catatan</label>
                            <textarea name="notes" class="form-control bg-light" rows="3" placeholder="Tuliskan kebutuhan belajar Anda (opsional)">{{ old('notes') }}</textarea>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold shadow-sm" style="background-color: #0f766e; border-color: #0f766e; border-radius: 8px;">
                            Proses Pendaftaran
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Ajax Fetch -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.getElementById('course_id');
        const availabilityBox = document.getElementById('availability');

        selectElement.addEventListener('change', function () {
            const courseId = this.value;
            
            if (!courseId) {
                availabilityBox.className = 'alert alert-light border mt-2 py-2 px-3 text-muted';
                availabilityBox.innerHTML = 'Pilih kursus untuk melihat sisa kursi.';
                return;
            }
            
            availabilityBox.className = 'alert alert-light border mt-2 py-2 px-3 text-muted';
            availabilityBox.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memuat...';

            fetch('/courses/' + courseId + '/availability')
                .then(response => {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(data => {
                    availabilityBox.className = 'alert alert-success border-success mt-2 py-2 px-3';
                    availabilityBox.innerHTML = '<strong>' + data.remaining + ' kursi</strong> tersisa untuk <strong>' + data.course + '</strong>.';
                })
                .catch(() => {
                    availabilityBox.className = 'alert alert-danger border-danger mt-2 py-2 px-3';
                    availabilityBox.innerHTML = 'Gagal memuat ketersediaan.';
                });
        });
    });
</script>
@endsection