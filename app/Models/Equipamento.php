<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $table = 'equipamento';

    protected $fillable = [
        'nome',
        'marca',
        'modelo',
        'observacao',
        'usuario'
    ];

    public function usuario() {
        return $this->belongsTo('App\Models\user', 'usuario');
    }
}
