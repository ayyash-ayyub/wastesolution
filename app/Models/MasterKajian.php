<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKajian extends Model
{
    use HasFactory;

    protected $table = 'master_kajian';

    protected $fillable = [
        'judul',
        'penulis',
        'resume',
        'link_dokumen',
    ];
}
