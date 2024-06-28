<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaModel extends Model
{
    use HasFactory;
    protected $table = 'empresas';

    public function juegos(){
        return $this->hasMany('juegos');

    }
}
