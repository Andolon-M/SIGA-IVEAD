<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DataUser
 *
 * @property $id
 * @property $dni_user
 * @property $tipo_dni
 * @property $birthdate
 * @property $gender
 * @property $cell
 * @property $user_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class DataUser extends Model
{
    
    static $rules = [
		'dni_user',
    'tipo_dni',
		'birthdate',
		'gender',
		'cell',
		'user_id',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni_user','tipo_dni','birthdate','gender','cell','user_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    /*
    public function perteneceUser()
    {  
    return $this->belongsTo(User::class, 'user_id');
    }*/
    

}
