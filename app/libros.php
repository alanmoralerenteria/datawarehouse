<?php


namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class libros extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'libros';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'ruta','tipo','estado','area','autores','generos'
    ];
}