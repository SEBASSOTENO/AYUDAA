<?php

namespace App;

use App\Transformer\TallerTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Taller extends Model
{
    use SoftDeletes;

    public $transformer = TallerTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'nombre_t',
        'direccion',
        'telefono',
        'id_artesano'
    ];
}
