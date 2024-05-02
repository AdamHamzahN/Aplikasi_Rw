<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataWarga extends Model
{
    use HasFactory;
    protected $table = 'data_wargas';
    protected $primaryKey = 'nik';
    protected  $fillable = [
        'nik',
        'nama',
        'jenis_kelamin', 
        'tempat_lahir',
        'tanggal_lahir', 
        'agama',
        'pekerjaan', 
        'alamat', 
        'rt', 
        'kontak'
    ];
    public $timestamps= true;
}
