<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;

class Members extends Component
{
    public $members; // dari Models/Members.php
    public $search;
    public $name, $email, $status, $number, $id_member; // mengisi dan menghapus data
    public $isModal;

    public function render()
    {
        $searchParams = '%' . $this->search . '%';
        // $this->members = Member::orderBy('created_at', 'DESC')->get();
        return view('livewire.members', [
            'posts' => Member::where('name', 'like', $searchParams)->latest()->paginate(5),
        ]);
    }


    public function create()
    {
        $this->resetFields(); // Method buatan seediri
        $this->openModal(); // Method buatan seediri
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|unique:members,email,' . $this->id_member,
            'number' => 'required|numeric',
            'status' => 'required'
        ]);

        Member::updateOrCreate(
            ['id' => $this->id_member], // jika id-nya sama, maka akan diperbarui
            [
                'name' => $this->name,
                'email' => $this->email,
                'number' => $this->number,
                'status' => $this->status
            ]
            // jika id-nya tidak ada, maka akan ditambah
        );

        session()->flash('message', $this->id_member ? $this->name . " Diperbarui" : $this->name . " Ditambahkan");
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $mengambilData = Member::find($id);

        // mengambil isi dari setiap tabel
        $this->id_member = $mengambilData->id;
        $this->name = $mengambilData->name;
        $this->email = $mengambilData->email;
        $this->number = $mengambilData->number;
        $this->status = $mengambilData->status;

        $this->openModal();
    }

    public function delete($id)
    {
        $mengambilData = Member::find($id);
        $mengambilData->delete();

        session()->flash("message", $mengambilData->name . " sudah dihapus.");
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->status = '';
        $this->number = '';
        $this->id_member = '';
    }

    public function openModal()
    {
        $this->isModal = true;
    }

    public function closeModal()
    {
        $this->isModal = false;
    }
}
