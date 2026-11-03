@extends('layouts.app')

@section('title', 'Tambah Kursus')

@section('content')
<div class="container py-4" style="max-width: 760px;">
    <div class="mb-4">
        <a href="{{ route('courses.index') }}" class="text-decoration-none text-muted mb-2 d-inline-block">
            &larr; Kembali ke Daftar Kursus
        </a>
        <h1 class="h3 fw-bold">Tambah Kursus Baru</h1>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4 p-md-5">
            <form method="POST" action="{{ route('courses.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="code">Kode Kursus *</label>
                    <input class="form-control bg-light" id="code" name="code" value="{{ old('code') }}" required maxlength="20" placeholder="Contoh: WEB-101">
                    @error('code') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="name">Nama Kursus *</label>
                    <input class="form-control bg-light" id="name" name="name" value="{{ old('name') }}" required maxlength="120" placeholder="Contoh: Web Dasar">
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold" for="description">Deskripsi</label>
                    <textarea class="form-control bg-light" id="description" name="description" rows="3" placeholder="Deskripsi singkat kursus">{{ old('description') }}</textarea>
                    @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold" for="fee">Biaya (Rp) *</label>
                        <input class="form-control bg-light" id="fee" type="number" name="fee" value="{{ old('fee') }}" required placeholder="300000">
                        @error('fee') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold" for="quota">Kuota *</label>
                        <input class="form-control bg-light" id="quota" type="number" name="quota" value="{{ old('quota') }}" required placeholder="25">
                        @error('quota') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold" for="start_date">Tanggal Mulai *</label>
                        <input class="form-control bg-light" id="start_date" type="date" name="start_date" value="{{ old('start_date') }}" required>
                        @error('start_date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold" for="status">Status *</label>
                        <select class="form-select bg-light" id="status" name="status" required>
                            <option value="draft" @selected(old('status') === 'draft')>Draft</option>
                            <option value="open" @selected(old('status') === 'open')>Open</option>
                            <option value="closed" @selected(old('status') === 'closed')>Closed</option>
                        </select>
                        @error('status') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn text-white fw-bold px-4 py-2" type="submit" style="background-color: #0f766e;">
                        Simpan Kursus
                    </button>
                    <a class="btn btn-outline-secondary px-4 py-2" href="{{ route('courses.index') }}">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection