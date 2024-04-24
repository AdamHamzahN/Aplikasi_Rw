<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $primarykey = ['id_jabatan'];
    protected $fillable = ['nama_jabatan'];
    public $timestamps = true;
}
