<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'major' => ['required', 'string'],
            'class' => ['required', 'string'],
        ]);

        /** @var array{nis: string, name: string, gender: string, major: string, class: string} $validated */
        $student = new Student;
        $student->nis = $validated['nis'];
        $student->name = $validated['name'];
        $student->gender = $validated['gender'];
        $student->major = $validated['major'];
        $student->class = $validated['class'];
        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis,'.$id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'major' => ['required', 'string'],
            'class' => ['required', 'string'],
        ]);

        $student = Student::query()->findOrFail($id);
        $student->nis = $validated['nis'];
        $student->name = $validated['name'];
        $student->gender = $validated['gender'];
        $student->major = $validated['major'];
        $student->class = $validated['class'];
        $student->save();

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
