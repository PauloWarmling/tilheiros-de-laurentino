<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacao extends Model
{
    protected $table = 'participacoes';

    protected $fillable = [
        'pessoa_id',
        'evento_id',
    ];

    // Relacionamentos
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
