<?php

namespace App\Models;

use App\Transformers\BaseTransformer;

class YearlyCareer extends BaseModel
{
    /**
     * @var string UUID key
     */
    public $primaryKey = 'id';
    public $incrementing = true;

    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = [];

    /**
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['staff_id', 'work_gubun', 'work_detail', 'work_year', 'work_department', 'work_job', 'issue_at', 'remark'];

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

}
