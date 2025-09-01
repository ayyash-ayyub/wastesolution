<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterMetode extends Model
{
    use HasFactory;

    protected $table = 'master_metode';

    protected $fillable = [
        'kategori_sampah',
        'nama_metode',
    ];
}
