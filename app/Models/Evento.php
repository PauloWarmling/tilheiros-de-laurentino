<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data',
        'local',
        'horario_inicio',
        'horario_fim',
    ];

    public function getDataAttribute($value)
    {
        return new \DateTime($value);
    }
}