@extends('layouts.app')

@section('title', $title)

@section('content')

<div class="mb-8 border-b border-[#E5E3DB] pb-5">
    <a href="{{ route('teachers.index') }}" class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">&larr; Buku
        Induk</a>
    <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">Catat Guru Baru</h1>
    <p class="mt-1 text-sm text-slate-500">Isi data untuk mendaftarkan guru ke buku induk.</p>
</div>

<form action="{{ route('teachers.store') }}" method="POST" novalidate class="space-y-6 border border-[#E5E3DB] bg-white p-8">
    @csrf

    <div>
        <label for="nip"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">NIP</label>
        <input type="text" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Contoh: 198501012024" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
        @error('nip')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="name"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nama
            Lengkap</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama lengkap guru" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
        @error('name')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="gender"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Jenis
            Kelamin</label>
        <select id="gender" name="gender" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
            <option value="L" @selected(old('gender', 'L') === 'L')>Laki-laki</option>
            <option value="P" @selected(old('gender') === 'P')>Perempuan</option>
        </select>
        @error('gender')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="subject"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Mata Pelajaran</label>
        <select id="subject" name="subject" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
            <option value="" disabled @selected(old('subject') === null)>Pilih mata pelajaran</option>
            <option value="Akuntansi Dasar" @selected(old('subject') === 'Akuntansi Dasar')>Akuntansi Dasar</option>
            <option value="Jaringan Komputer" @selected(old('subject') === 'Jaringan Komputer')>Jaringan Komputer</option>
            <option value="Pemrograman Web" @selected(old('subject') === 'Pemrograman Web')>Pemrograman Web</option>
        </select>
        @error('subject')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="phone_number"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nomor Telepon</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Contoh: 08123456789" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
        @error('phone_number')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="status"
            class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Status</label>
        <select id="status" name="status" required
            class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
            <option value="" disabled @selected(old('status') === null)>Pilih status</option>
            <option value="Aktif" @selected(old('status') === 'Aktif')>Aktif</option>
            <option value="Tidak Aktif" @selected(old('status') === 'Tidak Aktif')>Tidak Aktif</option>
        </select>
        @error('status')
            <span class="py-2 text-xs text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-end gap-4 border-t border-[#EFEDE6] pt-6">
        <a href="{{ route('teachers.index') }}" class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">Batal</a>
        <button type="submit"
            class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Simpan
            ke Buku Induk</button>
    </div>
</form>
@endsection