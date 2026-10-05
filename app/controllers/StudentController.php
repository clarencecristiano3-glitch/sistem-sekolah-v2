<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

require_once '../app/core/Controller.php';
require_once '../app/models/Student.php';

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::select('id', 'nis', 'name', 'class', 'major')->get();
    
        $this->view('students.index', [
            'title' => $title,
            'students' => $students,
        ]);
    }

    public function create()
    {
        $this->view('students.create', [
            'title' => 'Tambah Siswa',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'. $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class' => ['required', 'string'],
        ]);

       //Tambahkan Data Siswa ke Database
        Student::create($validatedRequest);
    
        // handle if success
        return redirect()->route('students.index');
    }

    public function show(student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
      

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
         return view('students.edit', [
            'title' => '$title',
            'student' => $student,
        ]);

        
    }

    public function update(Student $student, Request $request)
    {
        //validasi
         $validatedRequest = $request->validate([
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'. $student->id],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki,Perempuan'],
            'major' => ['required', 'string', 'in:AKL,TKJ,BID'],
            'class' => ['required', 'string'],
        ]);
        //update data siswa
        $student->update($validatedRequest);

        //handle if success
        return redirect()->route('students.index');
    }

    public function destroy(string $id)
    {
        //delete data
        $student->delete();

        //handle if success
        return redirect()->route('students.index');
    }
