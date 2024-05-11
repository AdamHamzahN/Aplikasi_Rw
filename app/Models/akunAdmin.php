<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AutentikasiAdmin;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class akunAdmin extends AutentikasiAdmin
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['username','password','role'];
    protected $hidden = ['username','password'];
}
