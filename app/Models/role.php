<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    // // Nama tabel jika tidak sesuai default (roles sudah sesuai jadi ini opsional)
    // protected $table = 'roles';

    // // Kolom yang boleh diisi massal (mass assignable)
    // protected $fillable = [
    //     'name',
    // ];

    // // Relasi Role ke banyak User
    // public function users()
    // {
    //     return $this->hasMany(User::class, 'role_id');
    // }
}
