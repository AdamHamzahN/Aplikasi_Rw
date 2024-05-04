<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class akunWarga extends Model
{
    use HasFactory;
    protected $table = 'akun_wargas';
    protected $primaryKey = 'id_akun_warga';
    protected  $fillable = ['password'];
    public $timestamps = true;

    public function nik():HasOne
    {
        return $this->hasOne(dataWarga::class,'nik','nik');
    }
}

