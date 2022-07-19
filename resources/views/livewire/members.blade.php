<x-slot name="header">
    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Data Member</h1>
</x-slot>

<div class="py-12">
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

            <!-- wire:click="namaMethod" di folder Livewire/Members/create() -->
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded my-3">Tambah</button>
            @if ($isModal)

            @include('livewire.create')
            <!-- Jika true, maka akan mengeluarkan alert -->
            <!-- di folder layouts/livewire/create -->

            @endif

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
                    @forelse ($members as $data)
                    <tr>
                        <td class="border px-4 py-2">{{ $data->name }}</td>
                        <td class="border px-4 py-2">{{ $data->email }}</td>
                        <td class="border px-4 py-2">{{ $data->number }}</td>
                        <td class="border px-4 py-2">{!! $data->status_label !!}</td>
                        <td class="border px-4 py-2">
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
        </div>
    </div>
</div>