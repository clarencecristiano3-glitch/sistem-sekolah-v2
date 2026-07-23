<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
     public function index()
    {
        return "ini adalah halaman daftar Teacher";
    }

    public function show(string $id)
    {
        return "ini adalah halaman detail Teacher dengan ID: {$id}";
    }
    public function create()
    {
        return "ini adalah halaman tambah Teacher";
    }

    public function edit(string $id)
    {
        return "ini adalah halaman edit Teacher dengan ID: {$id}";
    }

    public function store()
    {
        return "menambah data Teacher baru";
    }

    public function update(string $id)
    {
        return "mengubah data Teacher dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data Teacher dengan ID: {$id}";
    }
}
