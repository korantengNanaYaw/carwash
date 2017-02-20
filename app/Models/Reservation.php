<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 16 Feb 2017 21:42:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Reservation
 * 
 * @property int $id
 * @property string $carwashphone
 * @property string $customerphone
 * @property string $carnumber
 * @property string $vehicletype
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Reservation extends Eloquent
{
	protected $table = 'reservation';

	protected $fillable = [
		'carwashphone',
		'customerphone',
		'carnumber',
		'vehicletype'
	];
}
