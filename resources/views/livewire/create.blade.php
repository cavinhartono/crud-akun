<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
  <div class="flex justify-center items-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-800 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog">
      <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <h1 class="text-3xl text-center">Tambah Siswa</h1>
          <div class="">
            <div class="mb-4">
              <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
              <input type="text" wire:model="name" id="nama" class="border border-gray-300 shadow rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              @error('name')
              <span class="text-red-700">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
              <input type="text" wire:model="email" id="email" class="border border-gray-300 shadow rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              @error('email')
              <span class="text-red-700">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <label for="telp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon:</label>
              <input type="text" wire:model="number" id="telp" class="border border-gray-300 shadow rounded w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              @error('number')
              <span class="text-red-700">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <label for="jenis" class="block text-gray-700 text-sm font-bold mb-2">Kehadiran</label>
              <select wire:model="status" class="shadow border-gray-300 appearance-none border rounded w-full px-3 py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="jenis">
                <option value="">Pilih</option>
                <option value="0">Alfa</option>
                <option value="1">Izin</option>
                <option value="2">Sakit</option>
                <option value="3">Hadir</option>
              </select>
              @error('status')
              <span class="text-red-700">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click.prevent="store()" type="button" class="inline-block bg-blue-600 rounded-md hover:bg-blue-700 px-4 py-2 text-white">Save</button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button wire:click="closeModal()" type="button" class="inline-block bg-white border border-gray-500 rounded-md px-4 py-2 text-gray-700">Cancel</button>
          </span>
        </div>
      </form>
    </div>
  </div>
</div>