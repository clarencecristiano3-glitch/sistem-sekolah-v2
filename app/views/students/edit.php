<div class="mt-8 space-y-2">
            <!-- Card Header Start -->
            <div class="p-4 shadow rounded-lg bg-white">
                <h1 class="text-2xl font-bold">Edit Siswa</h1>
                <p>Memperbarui informasi siswa</p>
            </div>
            <!-- Card Header End -->
 
            <!-- Card body Start -->
                <div class= "bg-white shadow rounded-lg p-4 " >
                   <form action="/students/<?= $student['id'] ?>" method="POST" class="grid grid-cols-2 gap-4">
                    <input type="hidden" name="_method" value="PUT">
                   <div class="space-y-2">
                        <label class = " block font-bold" for="name">Nama</label>
                        <input value="<?= $student['name'] ?>" class="w-full px-4 py-2 border rounded-lg " type="text" id="name" placeholder="Masukkan nama" name="name">
                    </div>
 
                   <div class="space-y-2" >
                        <label class = " block font-bold" for="nis">NIS</label>
                        <input value="<?= $student['nis'] ?>" class="w-full px-4 py-2 border rounded-lg " type="text" id="nis" placeholder="Masukkan NIS" name="nis">
                    </div>
 
                   <div class="space-y-2">
                        <label class = " block font-bold" for="class">Kelas</label>
                        <input value="<?= $student['class'] ?>" class="w-full px-4 py-2 border rounded-lg " type="text" id="class" placeholder="Masukkan kelas" name="class">
                    </div>
 
                   <div class="space-y-2">
                        <label class = " block font-bold" for="phone_number">No Telepon</label>
                        <input value="<?= $student['phone_number'] ?>" class="w-full px-4 py-2 border rounded-lg " type="text" id="phone_number" placeholder="Masukkan nama" name="phone_number">
                    </div>
 
                    <div class="flex justify-end col-span-2 gap-4">
                        <a href="/students" class="py-2 px-4 bg-gray-100 rounded-lg">Kembali</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 rounded-lg text-white">Simpan</button>
                    </div>
 
                   </form>
                </div>
            <!-- Card body End --> 
        </div>
        