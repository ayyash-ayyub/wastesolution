<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLimbah extends Model
{
    use HasFactory;

    protected $table = 'data_limbah';

    protected $fillable = [
        'nama_limbah',
        'kategori_limbah',
        'sub_kategori_limbah',
        'metode',
        'master_metode_id',
        'master_lokasi_id',
        'tonasi',
        'lokasi',
    ];

    public function masterMetode()
    {
        return $this->belongsTo(\App\Models\MasterMetode::class, 'master_metode_id');
    }

    public function masterLokasi()
    {
        return $this->belongsTo(\App\Models\MasterLokasi::class, 'master_lokasi_id');
    }
}
