@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    
                    <h3 class="fw-bold mb-1">Pendaftaran Kursus</h3>
                    <p class="text-muted mb-4">Pilih peserta dan kursus yang tersedia.</p>

                    <!-- Pesan Sukses -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('enrollments.store') }}">
                        @csrf

                        <!-- Pilih Peserta (Relasi Baru) -->
                        <div class="mb-4">
                            <label for="participant_id" class="form-label fw-semibold text-secondary" style="font-size: 14px;">Pilih Peserta *</label>
                            <select id="participant_id" name="participant_id" class="form-select bg-light @error('participant_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Peserta --</option>
                                @foreach ($participants as $participant)
                                    <option value="{{ $participant->id }}" @selected(old('participant_id') == $participant->id)>
                                        {{ $participant->name }} ({{ $participant->email }})
                                    </option>
                                @endforeach
                            </select>
                            @error('participant_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Pilih Kursus -->
                        <div class="mb-4">
                            <label for="course_id" class="form-label fw-semibold text-secondary" style="font-size: 14px;">Pilih Kursus *</label>
                            <select id="course_id" name="course_id" class="form-select bg-light @error('course_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Kursus --</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" @selected(old('course_id') == $course->id)>
                                        {{ $course->name }} (Mulai: {{ $course->start_date?->format('d/m/Y') }})
                                    </option>
                                @endforeach
                            </select>
                            @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            
                            <!-- Kotak Ajax -->
                            <div id="availability" class="alert alert-light border mt-2 py-2 px-3 text-muted" style="font-size: 14px;">
                                Pilih kursus untuk melihat sisa kursi.
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold shadow-sm" style="background-color: #0f766e; border-color: #0f766e; border-radius: 8px;">
                            Simpan Pendaftaran
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