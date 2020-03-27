<?php

namespace App;

use App\Transformer\UsuarioTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    public $transformer = UsuarioTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'nombre_u',
        'ap_u',
        'am_u',
        'telefono',
        'direccion',
        'email'
    ];
}
