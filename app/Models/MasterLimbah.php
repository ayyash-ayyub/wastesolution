<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLimbah extends Model
{
    use HasFactory;

    protected $table = 'master_limbah';

    protected $fillable = [
        'nama_kategori',
        'nama_subkategori',
    ];
}

