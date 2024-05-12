<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as AutentikasiWarga;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class akunWarga extends AutentikasiWarga
{
    use HasFactory,HasFactory, Notifiable;
    protected $table = 'akun_wargas';
    protected $primaryKey = 'id_akun_warga';
    protected  $fillable = ['username','password'];
    public $timestamps = true;

    public function nik():HasOne
    {
        return $this->hasOne(dataWarga::class,'nik','username');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}

