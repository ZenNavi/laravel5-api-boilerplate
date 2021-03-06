<?php

namespace App\Models;

use App\Transformers\BaseTransformer;

class Department extends BaseModel
{
    /**
     * @var int Auto increments integer key
     */
    public $primaryKey = 'id';

    public $incrementing = true;

    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = ['staffs'];

    /**
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['dept_id', 'dept_name', 'dept_detail'];

    /**
     * @var array The attributes that should be hidden for arrays and API output
     */
    protected $hidden = [];

    /**
     * Return the validation rules for this model
     *
     * @return array Rules
     */
    public function getValidationRules()
    {
        return [];
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class, 'dept_id', 'dept_id');
    }

}
