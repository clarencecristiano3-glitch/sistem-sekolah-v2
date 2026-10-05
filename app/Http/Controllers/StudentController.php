<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = Student::query()->orderBy('id')->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        $student = Student::query()->findOrFail($id);

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title,
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        $student = Student::query()->findOrFail($id);

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $validatedRequest = $request->validated();

        /** @var array{nis: string, name: string, gender: string, major: string, class: string} $validatedRequest */
        $student = new Student;
        $student->nis = $validatedRequest['nis'];
        $student->name = $validatedRequest['name'];
        $student->gender = $validatedRequest['gender'];
        $student->major = $validatedRequest['major'];
        $student->class = $validatedRequest['class'];
        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $validatedRequest = $request->validated();
        $student = Student::query()->findOrFail($id);
        $student->update($validatedRequest);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $student = Student::query()->findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
