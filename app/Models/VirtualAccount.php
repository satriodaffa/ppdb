<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualAccount extends Model
{
    use HasFactory;
    protected $table = 'va';
    protected $fillable = [
        'norek',
        'user_id',
        'nama'
    ];
}
