<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class UsuarioModel extends Authenticable
{
    use HasFactory;
    protected $table = 'usuarios';

    public function rol(){
        return $this->belongsTo('roles');
    }

    public function historial(){
        return $this->hasMany('historial');
    }
}
