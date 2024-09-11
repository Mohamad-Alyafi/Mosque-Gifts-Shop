<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SellPoint
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Category[] $categories
 * @property Collection|SellProcess[] $sell_processes
 *
 * @package App\Models
 */
class SellPoint extends Model
{
	protected $table = 'sell_points';

	protected $fillable = [
		'name'
	];

	public function categories()
	{
		return $this->hasMany(Category::class);
	}

	public function sell_processes()
	{
		return $this->hasMany(SellProcess::class);
	}
}
