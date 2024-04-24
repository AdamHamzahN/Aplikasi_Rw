<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aduanwarga extends Model
{
    use HasFactory;
    protected $table = 'aduanwargas';
    protected $primarykey = 'id_aduan';
    protected $fillable = ['nama','aduan'];
}
