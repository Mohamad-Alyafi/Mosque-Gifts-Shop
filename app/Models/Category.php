<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $name
 * @property int $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $sell_point_id
 * 
 * @property SellPoint $sell_point
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';

	protected $casts = [
		'price' => 'int',
		'sell_point_id' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'sell_point_id'
	];

	public function sell_point()
	{
		return $this->belongsTo(SellPoint::class);
	}
}
