<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKemitraan extends Model
{
    use HasFactory;

    protected $table = 'master_kemitraan';

    protected $fillable = [
        'nama_mitra',
        'jenis',
        'nama_kegiatan',
        'sasaran',
        'jumlah_penerima_manfaat',
    ];
}

