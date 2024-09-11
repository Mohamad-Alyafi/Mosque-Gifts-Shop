<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $name
 * @property string $group
 * @property int $total_points
 * @property int $current_points
 * @property int $added_points
 * @property string $barcode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|SellProcess[] $sell_processes
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'students';

	protected $casts = [
		'total_points' => 'int',
		'current_points' => 'int',
		'added_points' => 'int'
	];

	protected $fillable = [
		'name',
		'group',
		'total_points',
		'current_points',
		'added_points',
		'barcode'
	];

	public function sell_processes()
	{
		return $this->hasMany(SellProcess::class);
	}
}
