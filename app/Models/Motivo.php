<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    static $rules = [
        'descripcion'=>'required',
    ];
    protected $fillable = [
        'id', 'descripcion'
    ];
    protected $perPage = 20;
    
    public function registros(){
        return $this->hasMany('App\Models\Registro','id_razon_modificacion','id');
    }
}
