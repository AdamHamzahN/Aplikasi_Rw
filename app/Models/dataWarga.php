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
        'jns_kelamin', 
        'tempat_lahir',
        'tgl_lahir', 
        'ayah',
        'ibu',
        'pekerjaan', 
        'alamat', 
        'rt', 
        'kontak'
    ];
    public $timestamps= false;
}
