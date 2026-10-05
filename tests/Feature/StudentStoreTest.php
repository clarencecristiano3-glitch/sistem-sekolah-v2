<?php

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('student store action redirects to the student list', function () {
    $response = $this->post('/students', [
        'nis' => '2001',
        'name' => 'Budi Santoso',
        'gender' => 'L',
        'major' => 'TKJ',
        'class' => 'XII TKJ 1',
    ]);

    $response->assertRedirect('/students')
        ->assertSessionHas('success', 'Data siswa berhasil ditambahkan.');

    $this->assertDatabaseHas('students', [
        'nis' => '2001',
        'name' => 'Budi Santoso',
        'gender' => 'L',
        'major' => 'TKJ',
        'class' => 'XII TKJ 1',
    ]);
});

test('student list displays records from the database', function () {
    Student::create([
        'nis' => '2002',
        'name' => 'Siti Aminah',
        'gender' => 'P',
        'major' => 'AKL',
        'class' => 'XII AKL 1',
    ]);

    $this->get('/students')
        ->assertSuccessful()
        ->assertSee('2002')
        ->assertSee('Siti Aminah');
});

test('student list displays an empty state when there are no records', function () {
    $this->get('/students')
        ->assertSuccessful()
        ->assertSee('Data Siswa Tidak Tersedia.');
});

test('student detail displays the record selected by its ID', function () {
    $student = Student::create([
        'nis' => '2003',
        'name' => 'Andi Pratama',
        'gender' => 'Laki-laki',
        'major' => 'TKJ',
        'class' => 'X TKJ 1',
    ]);

    $this->get("/students/{$student->id}")
        ->assertSuccessful()
        ->assertSee('Andi Pratama')
        ->assertSee('2003')
        ->assertSee('X TKJ 1')
        ->assertSee(route('students.edit', ['id' => $student->id]));
});

test('student destroy deletes the selected record', function () {
    $student = Student::create([
        'nis' => '2004',
        'name' => 'Dewi Lestari',
        'gender' => 'P',
        'major' => 'AKL',
        'class' => 'XII AKL 2',
    ]);

    $this->delete("/students/{$student->id}")
        ->assertRedirect('/students')
        ->assertSessionHas('success', 'Data siswa berhasil dihapus.');

    $this->assertDatabaseMissing('students', [
        'id' => $student->id,
    ]);
});

test('student store requires NIS to contain exactly four characters', function () {
    $response = $this->from('/students/create')
        ->followingRedirects()
        ->post('/students', [
            'nis' => '123',
            'name' => 'Budi Santoso',
            'gender' => 'L',
            'major' => 'TKJ',
            'class' => 'XII TKJ 1',
        ]);

    $response->assertSessionHasErrors(['nis'])
        ->assertSee('The nis field must be 4 characters.');
});

test('student store requires all fields', function () {
    $response = $this->from('/students/create')
        ->followingRedirects()
        ->post('/students', []);

    $response->assertSessionHasErrors(['nis', 'name', 'gender', 'major', 'class'])
        ->assertSee('The nis field is required.')
        ->assertSee('The name field is required.')
        ->assertSee('The major field is required.')
        ->assertSee('The class field is required.');
});

test('teacher store requires all fields', function () {
    $this->from('/teachers/create')
        ->followingRedirects()
        ->post('/teachers', [])
        ->assertSessionHasErrors(['nip', 'name', 'gender', 'subject', 'phone_number', 'status']);
});
