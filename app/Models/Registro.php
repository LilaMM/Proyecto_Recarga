<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    static $rules = [
        'id_player'=>'required',
        'id_banco'=>'required',
        'monto'=>'required',
        'image'=>'required',
    ];
    protected $fillable = [
        'id_player', 'id_banco', 'monto', 'image', 'id_razon_modificacion'
    ];
    protected $perPage = 20;
    public function player(){
        return $this->hasOne('App\Models\Player','codigo','id_player');
    }

    public function banco(){
        return $this->hasOne('App\Models\Banco','id','id_banco');
    }
    
}
