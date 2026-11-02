<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// 1. Route Home (Menampilkan Beranda & Katalog)
Route::get('/', function () {
    $courses = [
        1 => ['id' => 1, 'name' => 'Web Dasar', 'desc' => 'Belajar struktur HTML, CSS, dan layout responsive.'],
        2 => ['id' => 2, 'name' => 'PHP Dasar', 'desc' => 'Belajar logika, variabel, function, dan form processing.'],
        3 => ['id' => 3, 'name' => 'Laravel Fundamental', 'desc' => 'Belajar Route, Controller, Blade, dan arsitektur MVC.'],
    ];
    return view('home', compact('courses'));
})->name('home');

// 2. Route Tampil Form Pendaftaran
Route::get('/pendaftaran', function () {
    $courses = [
        1 => ['name' => 'Web Dasar'],
        2 => ['name' => 'PHP Dasar'],
        3 => ['name' => 'Laravel Dasar'],
    ];
    return view('enrollments.create', compact('courses'));
})->name('enrollments.create');

// 3. Route Proses Submit Form (Validasi)
Route::post('/pendaftaran/preview', function (Request $request) {
    // Validasi semua input dari form
    $data = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'string', 'max:15'],
        'prodi' => ['required', 'string', 'max:50'],
        'course_id' => ['required', 'integer'],
        'method' => ['required', 'string'],
        'participant_type' => ['required', 'string'],
        'interests' => ['nullable', 'array'], // Tambahan untuk checkbox
        'notes' => ['nullable', 'string'],    // Tambahan untuk textarea
    ]);

    // Kembalikan ke halaman form dengan pesan sukses
    return back()
        ->with('success', 'Pendaftaran berhasil! Data Anda sudah kami terima.')
        ->withInput();
})->name('enrollments.preview');

// 4. Route JSON Ketersediaan Kursi (Untuk Ajax)
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => ['course' => 'Web Dasar', 'remaining' => 12],
        2 => ['course' => 'PHP Dasar', 'remaining' => 8],
        3 => ['course' => 'Laravel Dasar', 'remaining' => 4],
    ];

    // Jika ID kursus tidak ada di array, tampilkan 404
    abort_unless(isset($availability[$course]), 404);

    // Kembalikan response dalam format JSON
    return response()->json($availability[$course]);
})->name('courses.availability');