<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at']; // Menyembunyikan created_at dan updated_at secara global
    protected $table    = 'pegawai';
    protected $fillable =
    [
        'id',
        'nip',
        'nama',
        'jeniskelamin',
        'agama',
        'tempat',
        'tanggal',
        'jabatan_id',
        'kontak',
        'alamat',
        'image',
        'status'
    ];
}
