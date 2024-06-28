<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialModel extends Model
{
    use HasFactory;
    protected $table = 'historial';

    public function usuarios(){
        return $this->belongsTo('usuarios');
    }

    public function juegos(){
        return $this->belongsTo('juegos');
    }

}
