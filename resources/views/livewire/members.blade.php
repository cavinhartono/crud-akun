<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Kehadiran</h1>
</x-slot>

<div class="py-9">
    <div class="mx-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <div class="createInsertBx flex justify-between align-items-center">
                <!-- wire:click="namaMethod" di folder Livewire/Members/create() -->
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded my-3">Tambah</button>
                @if ($isModal)

                @include('livewire.create')
                <!-- Jika true, maka akan mengeluarkan alert -->
                <!-- di folder layouts/livewire/create -->

                @endif

                <div class="inputBx" style="position: relative; width: 300px; height: 100%">
                    <input type="text" wire:model="search" class="search" style="outline: none; width: 100%; padding-left: 35px; padding-right: 60px; border: 1px soild #ddd; border-radius: 4px;" placeholder="Mencari data Siswa...">
                    <div class="iconBx" style="position: absolute; top: 0; left: 0; padding: 12px;">
                        <ion-icon name="search"></ion-icon>
                    </div>
                </div>
            </div>

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Telp</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $data)
                    <tr>
                        <td class="border px-4 py-2">{{ $data->name }}</td>
                        <td class="border px-4 py-2">{{ $data->email }}</td>
                        <td class="border px-4 py-2">{{ $data->number }}</td>
                        <td class="border px-4 py-2 text-center">{!! $data->status_label !!}</td>
                        <td class="border px-4 py-2 text-center">
                            <button wire:click="edit({{ $data->id }})" class="inline-block px-4 py-2 bg-yellow-400 rounded text-white hover:bg-yellow-600">Edit</button> <!-- Edit Data -->
                            <button wire:click="delete({{ $data->id }})" class="inline-block px-4 py-2 bg-red-400 rounded text-white hover:bg-red-600">Delete</button> <!-- Delete Data -->
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>