<?php

namespace Api\Companies\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $connection = 'mysql_ext';
	const TABLE_NAME   = 'com_companies';
	const STATE_ACTIVE = true;
	const STATE_INACTIVE = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        //CURRENT RAWS
		'id', 'ruc','name', 'url_image',
		'description','address','phone','website','date_healing',
        //AUDITORY RAWS
        'flag_active', 'created_at', 'updated_at', 'deleted_at'
	];

	public function getFillable() {
		# code...
		return $this->fillable;
	}
    
    protected $casts = [
        // 'logo' => 'array',
        // 'language_json' => 'array',
        // 'website_description' => 'array',
        // 'company_plan' => 'array',
        // 'areas_json' => 'array',
    ];

	protected $hidden = [
		'created_at', 'updated_at', 'deleted_at'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $table = self::TABLE_NAME;
}