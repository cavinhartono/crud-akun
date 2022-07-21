<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = ['name', 'email', 'number', 'status'];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        if ($this->status == 0) {
            return '<span class="text-red-500">Alfa</span>';
        } elseif ($this->status == 1) {
            return '<span class="text-yellow-600">Izin</span>';
        } elseif ($this->status == 2) {
            return '<span class="text-yellow-600">Sakit</span>';
        } else {
            return '<span class="text-green-600">Hadir</span>';
        }
    }
}
