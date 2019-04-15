<?php

namespace App\Models;

use App\Transformers\BaseTransformer;

class Staff extends BaseModel
{
    /**
     * @var int Auto increments integer key
     */
    public $primaryKey = 'id';
    public $incrementing = true;

    /**
     * @var array Relations to load implicitly by Restful controllers
     */
    public static $localWith = ['department', 'picture'];

    // public static $localWithList   = ['department', 'picture'];
    public static $localWithDetail = ['careers', 'educations','job_trainings','qualifications','yearly_careers'];

    /**
     * @var null|BaseTransformer The transformer to use for this model, if overriding the default
     */
    public static $transformer = null;

    /**
     * @var array The attributes that are mass assignable.
     */
    protected $fillable = ['name','email','pic_id','dept_id','grade_id','address','birth','enter_at','status','title'];

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

//    public static function boot()
//    {
//        parent::boot();
//
//        // Order by name ASC
//        static::addGlobalScope('order', function (Builder $builder) {
//            $builder->orderBy('created_at', 'asc');
//        });
//    }

    public function department()
    {
        return $this->hasOne(Department::class, 'dept_id', 'dept_id');
    }

    public function picture(){
        return $this->hasOne(Attachment::class, 'id', 'pic_id');
    }

    public function yearly_careers()
    {
        return $this->hasMany(YearlyCareer::class, 'staff_id', 'id');
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class, 'staff_id', 'id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'staff_id', 'id');
    }

    public function careers()
    {
        return $this->hasMany(Career::class, 'staff_id', 'id');
    }

    public function job_trainings()
    {
        return $this->hasMany(JobTraining::class, 'staff_id', 'id');
    }
}
