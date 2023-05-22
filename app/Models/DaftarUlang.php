<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VirtualAccount;

class DaftarUlang extends Model
{
    use HasFactory;
    protected $table = 'daftar_ulang';
    protected $fillable = [
        'skl',
        'sk',
        'san',
        'nama',
        'norek'
    ];
}
