<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    static $rules = [
        'codigo'=>'required',
        'nombres' => 'required',
        'apellidos' => 'required',
    ];
    protected $fillable = [
        'id', 'codigo', 'nombres', 'apellidos'
    ];
    protected $perPage = 20;
    
    public function registros(){
        return $this->hasMany('App\Models\Registro','id_player','codigo');
    }
}
