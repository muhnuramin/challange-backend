<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;
    protected $primaryKey = 'cultures_id';
    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'statusPublish',
        'gambar',
        'emailpenulis',
        'namapenulis',
        'nohp',
    ];
}
