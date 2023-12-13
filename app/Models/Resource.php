<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Resource
 *
 * @property $id
 * @property $nombre
 * @property $tipo
 * @property $descripcion
 * @property $url
 * @property $archivo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Resource extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'tipo' => 'required',
		'descripcion',
    'url_iframe',
		'url',
		'archivo',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','tipo','descripcion','url','url_iframe','archivo'];



}
