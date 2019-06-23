<?php

namespace App\Models;

use App\Transformers\BaseTransformer;

class Qualification extends BaseModel
{
    /**
     * @var string UUID key
     */
    public $primaryKey = 'id';
    public $incrementing = true;
    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = ['attachment'];

    /**
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['staff_id', 'qualification_name', 'qualification_type', 'qualification_grade', 'attach_id', 'issuing_authority', 'remark'];

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

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'id', 'attach_id');
    }
}
