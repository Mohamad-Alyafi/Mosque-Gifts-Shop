<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SellProcess
 * 
 * @property int $id
 * @property int $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $teacher_id
 * @property int $student_id
 * @property int $sell_point_id
 * 
 * @property SellPoint $sell_point
 * @property Student $student
 * @property Teacher $teacher
 *
 * @package App\Models
 */
class SellProcess extends Model
{
	protected $table = 'sell_processes';

	protected $casts = [
		'price' => 'int',
		'teacher_id' => 'int',
		'student_id' => 'int',
		'sell_point_id' => 'int'
	];

	protected $fillable = [
		'price',
		'teacher_id',
		'student_id',
		'sell_point_id'
	];

	public function sell_point()
	{
		return $this->belongsTo(SellPoint::class);
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}
}
