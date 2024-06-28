<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuegoModel extends Model
{
    use HasFactory;
    protected $table = 'juegos';

    public function empresa(){
        return $this->belongsTo('empresas');
    }

    public function historial(){
        return $this->hasMany('historial');
    }
}
