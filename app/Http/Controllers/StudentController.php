<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function index()
    {
        return "ini adalah halaman daftar Student";
    }

    public function show(string $id)
    {
        return "ini adalah halaman detail Student dengan ID: {$id}";
    }
    public function create()
    {
        return "ini adalah halaman tambah Student";
    }

    public function edit(string $id)
    {
        return "ini adalah halaman edit Student dengan ID: {$id}";
    }

    public function store()
    {
        return "menambah data Student baru";
    }

    public function update(string $id)
    {
        return "mengubah data Student dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "menghapus data Student dengan ID: {$id}";
    }
}
