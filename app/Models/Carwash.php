<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 16 Feb 2017 21:42:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Carwash
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $latitude
 * @property string $longitutde
 * @property string $motovehicle
 * @property string $salooncar
 * @property string $trucks
 * @property string $services
 * @property string $startclose
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Carwash extends Eloquent
{
	protected $table = 'carwash';

	protected $fillable = [
		'name',
		'phone',
		'address',
		'latitude',
		'longitutde',
		'motovehicle',
		'salooncar',
		'trucks',
		'services',
		'startclose'
	];
}
