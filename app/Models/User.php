<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 16 Feb 2017 21:42:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
        'phone',
        'address',
        'latitude',
        'longitutde',
        'motovehicle',
        'salooncar',
        'trucks',
        'services',
        'startclose',
		'password',
		'remember_token'
	];
}
