<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['empresa', 'sector', 'tamano', 'adviser_id'];

    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

}