<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // 1. Menampilkan Daftar Kursus
    public function index()
    {
        $courses = Course::latest()->get(); 
        return view('courses.index', compact('courses'));
    }

    // 2. Menampilkan Form Tambah Kursus
    public function create()
    {
        return view('courses.create');
    }

    // 3. Menyimpan Data ke Database
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'max:20', 'unique:courses,code'],
            'name' => ['required', 'max:120'],
            'description' => ['nullable', 'string'],
            'fee' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:1', 'max:500'],
            'start_date' => ['required', 'date'],
            'status' => ['required', 'in:draft,open,closed'],
        ]);

        Course::create($data);

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }
}