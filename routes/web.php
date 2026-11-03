<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Controllers\CourseController;

// =====================================================================
// ROUTE UNTUK HALAMAN BERANDA & PENDAFTARAN (Pertemuan 9)
// =====================================================================

// 1. Route Home (Menampilkan Beranda & Katalog dari Database)
Route::get('/', function () {
    $courses = Course::all(); 
    return view('home', compact('courses'));
})->name('home');

// 2. Route Tampil Form Pendaftaran
Route::get('/pendaftaran', function () {
    $courses = Course::all(); 
    return view('enrollments.create', compact('courses'));
})->name('enrollments.create');

// 3. Route Proses Submit Form Pendaftaran
Route::post('/pendaftaran/preview', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'string', 'max:15'],
        'prodi' => ['required', 'string', 'max:50'],
        'course_id' => ['required', 'integer'],
        'method' => ['required', 'string'],
        'participant_type' => ['required', 'string'],
        'interests' => ['nullable', 'array'],
        'notes' => ['nullable', 'string'],
    ]);

    return back()
        ->with('success', 'Pendaftaran berhasil! Data Anda sudah kami terima.')
        ->withInput();
})->name('enrollments.preview');

// 4. Route JSON Ketersediaan Kursi (Untuk Ajax)
Route::get('/courses/{course}/availability', function (int $course) {
    $courseData = Course::findOrFail($course);
    
    return response()->json([
        'course' => $courseData->name,
        'remaining' => $courseData->quota 
    ]);
})->name('courses.availability');


// =====================================================================
// ROUTE UNTUK CRUD KURSUS (Pertemuan 10)
// =====================================================================

// Route Resource untuk CRUD Course
Route::resource('courses', CourseController::class);