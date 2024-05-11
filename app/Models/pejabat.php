<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;
    protected $table = 'pejabats';
    protected $primaryKey = ['id_pejabat'];
    protected $fillable = ['nama_jabatan','nik'];
    public $timestamps = true;
}
