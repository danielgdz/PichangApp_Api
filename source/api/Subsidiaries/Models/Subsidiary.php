<?php

namespace Api\Subsidiaries\Models;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $connection = 'mysql_ext';
	const TABLE_NAME   = 'com_subsidiaries';
	const STATE_ACTIVE = true;
	const STATE_INACTIVE = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        //CURRENT RAWS
        'id', 'com_companies_id', 'name', 'phone',
		'latitude', 'longitude', 'address',
		'contact_name', 'contact_email', 'url_image',
        //AUDITORY RAWS
        'flag_active', 'created_at', 'updated_at', 'deleted_at'
	];

	public function getFillable() {
		# code...
		return $this->fillable;
	}
    
    protected $casts = [
		'url_image' => 'array',
		'latitude' => 'double',
		'longitude' => 'double',
    ];

	protected $hidden = [
		 'updated_at', 'deleted_at'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $table = self::TABLE_NAME;
}