@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Daftar Kursus</h1>
            <p class="text-muted mb-0">Data diambil dari MySQL melalui Eloquent.</p>
        </div>
        {{-- Tombol Tambah warna Biru (bg-primary) --}}
        <a href="{{ route('courses.create') }}" class="btn btn-primary fw-bold">
            + Tambah Kursus
        </a>
    </div>

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- FORM PENCARIAN & FILTER --}}
    <form method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-4">
        <div class="col-md-6">
            <input type="search" name="q" value="{{ $search ?? '' }}" class="form-control" placeholder="Cari kode atau nama kursus...">
        </div>
        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">Semua Status</option>
                <option value="open" @selected(($status ?? '') === 'open')>Open</option>
                <option value="closed" @selected(($status ?? '') === 'closed')>Closed</option>
                <option value="draft" @selected(($status ?? '') === 'draft')>Draft</option>
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button class="btn btn-primary" type="submit">Cari</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    {{-- TABEL DATA --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    {{-- Header Tabel Warna Biru (bg-primary) --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="py-3 px-4">Kode</th>
                            <th class="py-3">Nama</th>
                            <th class="py-3">Biaya</th>
                            <th class="py-3">Kuota</th>
                            <th class="py-3">Mulai</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center" style="min-width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <td class="px-4 fw-bold text-primary">{{ $course->code }}</td>
                                <td>{{ $course->name }}</td>
                                <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                                <td>{{ $course->quota }} Kursi</td>
                                <td>{{ $course->start_date->format('d/m/Y') }}</td>
                                <td>
                                    @if($course->status == 'open')
                                        <span class="badge bg-success">Open</span>
                                    @elseif($course->status == 'draft')
                                        <span class="badge bg-warning text-dark">Draft</span>
                                    @else
                                        <span class="badge bg-danger">Closed</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-1 justify-content-center">
                                        <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-outline-warning text-dark">Edit</a>
                                        <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Hapus kursus ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    Tidak ada kursus yang sesuai pencarian/filter.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted small">
            Menampilkan {{ $courses->firstItem() ?? 0 }} sampai {{ $courses->lastItem() ?? 0 }} dari {{ $courses->total() }} hasil
        </div>
        <div>
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection