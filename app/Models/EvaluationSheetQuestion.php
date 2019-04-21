<?php

namespace App\Models;

use App\Transformers\BaseTransformer;

class EvaluationSheetQuestion extends BaseModel
{
    /**
     * @var string UUID key
     */
    public $primaryKey = 'id';
    public $incrementing = true;
    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = ['items'];

    /**
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['eval_id', 'eval_sheet_id', 'title', 'detail', 'points', 'sort'];

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

    public function items()
    {
        return $this->hasMany(EvaluationSheetQuestionItem::class, 'eval_sheet_question_id', 'id');
    }

}
