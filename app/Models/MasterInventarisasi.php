<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInventarisasi extends Model
{
    use HasFactory;

    protected $table = 'master_inventarisasi';

    protected $fillable = [
        'kategori',
        'sub_kategori',
        'tonase',
        'uji_kualitas',
    ];
}
