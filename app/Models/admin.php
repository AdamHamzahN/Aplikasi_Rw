<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $fillable =['username','password','role'];
    public $timestamps = false;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
