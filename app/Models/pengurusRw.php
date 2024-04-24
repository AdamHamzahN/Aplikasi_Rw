<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengurusRw extends Model
{
    use HasFactory;
    protected $table = 'pengurus_rw';
    protected $primarykey = 'id_pengurus_rw';
    protected $fillable =['nik','id_jabatan'];
    public $timestamps = true;


}
