<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Mahasiswa extends Model
{
    use HasFactory;
    use Sortable;
    protected $guarded = [];

    protected $primaryKey = 'nim';
    protected $keyType='string';

    public $sortable = ['nim', 'nama_lengkap', 'jenis_kelamin', 'jurusan', 'alamat'];
}
