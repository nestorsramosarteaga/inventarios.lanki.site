<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'celular'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
