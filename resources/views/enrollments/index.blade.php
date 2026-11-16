@extends('layouts.app')

@section('title', 'Laporan Pendaftaran')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Laporan Pendaftaran Kursus</h1>
            <p class="text-muted mb-0">Data relasional antara Peserta, Kursus, dan Jadwal.</p>
        </div>
        <a href="{{ route('enrollments.create') }}" class="btn text-white fw-bold" style="background-color: #0f766e;">
            + Tambah Pendaftaran
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="py-3 px-4">No</th>
                            <th class="py-3">Nama Peserta</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Kursus</th>
                            <th class="py-3">Tanggal Mulai</th>
                            <th class="py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($enrollments as $index => $enrollment)
                            <tr>
                                <td class="px-4">{{ $index + 1 }}</td>
                                <td class="fw-bold">{{ $enrollment->participant->name }}</td>
                                <td>{{ $enrollment->participant->email }}</td>
                                <td class="fw-bold text-success">{{ $enrollment->course->name }}</td>
                                <td>{{ $enrollment->course->start_date?->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ ucfirst($enrollment->status) }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    Belum ada data pendaftaran.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection