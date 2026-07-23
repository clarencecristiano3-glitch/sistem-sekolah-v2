<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\School\IndexController;


Route::get('/', function () {
    return view('welcome');
});

//MANAJEMEN DATA SISWA (ACTION CONTROLLER)
Route::name('students.')->prefix('students')->group(function () {

    //HALAMAN DAFTAR SISWA
    Route::get('/', [StudentController::class, 'index'])->name('index');

    //HALAMAN DETAIL SISWA
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');

    //HALAMAN TAMBAH SISWA
    Route::get('/create', [StudentController::class, 'create'])->name('create');

    //HALAMAN EDIT SISWA
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    //LOGIKA TAMBAH SISWA
    Route::post('/', [StudentController::class, 'store'])->name('store');

    //LOGIKA EDIT SISWA
    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    //LOGIKA HAPUS SISWA
    Route::delete(' /{id}', [StudentController::class, 'destroy'])->name('destroy');
});

//MANAJEMEN DATA GURU (SINGLE ACTION CONTROLLER)
Route::name('teachers.')->prefix('teachers')->group(function () {

    //HALAMAN DAFTAR GURU
    Route::get('/', [TeacherController::class, 'index'])->name('index');

    //HALAMAN DETAIL GURU
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');

    //HALAMAN TAMBAH GURU
    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    //HALAMAN EDIT GURU
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    //LOGIKA TAMBAH GURU
    Route::post('/', [TeacherController::class, 'store'])->name('store');

    //LOGIKA EDIT GURU
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    //LOGIKA HAPUS GURU
    Route::delete(' /{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

//MANAJEMEN DATA KELAS (INVOKABLE CONTROLLER)
Route::name('classes.')->prefix('classes')->group(function () {

    //HALAMAN DAFTAR GURU
    Route::get('/', IndexController::class)->name('index');

    //HALAMAN DETAIL GURU
    Route::get('/{id}', ShowController::class)->name('show');

    //HALAMAN TAMBAH GURU
    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    //HALAMAN EDIT GURU
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    //LOGIKA TAMBAH GURU
    Route::post('/', [TeacherController::class, 'store'])->name('store');

    //LOGIKA EDIT GURU
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    //LOGIKA HAPUS GURU
    Route::delete(' /{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

//MANAJEMEN DATA Jurusan (resource controller)
Route::resource('majors', MajorController::class);
