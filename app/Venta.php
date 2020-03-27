<?php

namespace App;

use App\Transformer\VentaTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    public $transformer = VentaTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'id_usuario',
        'id_artesano',
        'id_producto'
    ];
}
