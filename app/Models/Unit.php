<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'tipo_ua', 'marca', 'procesador', 'client_id', 'generacion'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
