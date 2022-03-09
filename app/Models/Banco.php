<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    static $rules = [
        'nombre'=>'required',
    ];
    //use HasFactory;
    protected $fillable = [
        'id', 'nombre'
    ];
    protected $perPage = 20;


    public function registros(){
        return $this->hasMany('App\Models\Registro','id_banco','id');
    }
}
