<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPelaporan extends Model
{
    use HasFactory;

    protected $table = 'master_pelaporan';

    protected $fillable = [
        'nama_laporan',
        'periode_mulai',
        'periode_selesai',
        'status',
        'lampiran_dokumen',
        'keterangan',
    ];
}
