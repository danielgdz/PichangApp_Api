<?php

namespace Api\Areas\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $connection = 'mysql_ext';
	const TABLE_NAME   = 'com_areas';
	const STATE_ACTIVE = true;
	const STATE_INACTIVE = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        //CURRENT RAWS
		'id', 'com_subsidiary_id', 'title',
		'description', 'flaglocation',
        //AUDITORY RAWS
        'flagactive', 'created_at', 'updated_at', 'deleted_at'
	];

	public function getFillable() {
		# code...
		return $this->fillable;
	}
    
    protected $casts = [
    ];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $table = self::TABLE_NAME;
}