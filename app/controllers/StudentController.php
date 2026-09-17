<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Student;

require_once '../app/core/Controller.php';
require_once '../app/models/Student.php';

class StudentController extends Controller
{
    public function index()
    {
        $studentModel = new Student();
        $students = $studentModel->getStudents();

        $this->view('students.index', [
            'title' => 'Daftar Siswa',
            'students' => $students,
        ]);
    }

    public function create()
    {
        $this->view('students.create', [
            'title' => 'Tambah Siswa',
        ]);
    }

    public function show(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $student = $studentModel->getStudent($id);

        $this->view('students.show', [
            'title' => 'Detail Siswa',
            'student' => $student,
        ]);
    }

    public function edit(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $student = $studentModel->getStudent($id);

        $this->view('students.edit', [
            'student' => $student,
        ]);
    }

    public function store()
    {
        $data = $_POST;
        $studentModel = new Student();
        $studentModel->insert($data);
    }

    public function update(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $studentModel->update($_POST, $id);

    }


    public function destroy(string $id)
    {
        $id = intval($id);
        $studentModel = new Student();
        $studentModel->delete($id);
    }

}