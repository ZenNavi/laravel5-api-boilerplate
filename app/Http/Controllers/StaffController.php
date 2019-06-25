<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Education;
use App\Models\JobTraining;
use App\Models\Qualification;
use App\Models\Role;
use App\Models\User;
use App\Models\YearlyCareer;
use App\Transformers\BaseTransformer;
use App\Models\Staff;
use Hash;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * @var BaseModel The primary model associated with this controller
     */
    public static $model = Staff::class;

    /**
     * @var BaseModel The parent model of the model, in the case of a child rest controller
     */
    public static $parentModel = null;

    /**
     * @var null|BaseTransformer The transformer this controller should use, if overriding the model & default
     */
    public static $transformer = null;

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function qualifyCollectionQuery($query){
        $query = parent::qualifyCollectionQuery($query);
        $search = request('search');
        if( !(empty($search)) ) {
            $query->where('name', 'like', '%'.$search.'%');
        }
        $deptId = request('dept_id');

        $roles = $this->auth()->user()->getRoles();

        if( ! $this->auth()->user()->isAdmin() ) {
            $user = $this->auth()->user();
            $deptId = $user->staff->dept_id;
        }

        if( !(empty($deptId)) ) {
            $query->where('dept_id', '=', $deptId);
        }

        $sort   = request('sort');
        return $query;
    }

    /**
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function post(Request $request)
    {
        $response = parent::post($request);

        $user = User::create([
            'email'        => request('email'),
            'password'     => request('password'),
            'name'         => request('name'),
            'primary_role' => Role::where('name', 'normal')->first()->role_id
        ]);

        $model = new static::$model;

        $staff = $model->where('email', '=', request('email'))->first();
        $staff->user_id = $user->user_id;
        $staff->save();

        return $response;
    }

    /**
     * @param string $uuid
     * @param Request $request
     * @return \Dingo\Api\Http\Response
     */
    public function patch($uuid, Request $request)
    {
        $response = parent::patch($uuid, $request);

        $password = request('password');
        $userId   = request('user_id');

        if( empty($userId)){

            if( empty($password) ) $password = 'demo';

            $user = User::create(['email'=>request('email'), 'password'=>Hash::make($password),'name'=>request('name'),'primary_role'=>Role::where('name', 'normal')->first()->role_id]);
            $model = new static::$model;
            $staff = $model->where('id','=',request('id'))->first();
            $staff->user_id = $user->user_id;
            $staff->save();

            $userId = $user->user_id;

        }

        $user = User::where('user_id', '=', $userId)->first();
        if( !empty($password) ) {
            $user->password = Hash::make($password);
        }
        $user->email = request('email');
        $user->save();

        $educations = $request->get('educations');
        $educationIdList = [];
        foreach($educations as $education ) {
            $education['staff_id'] = $uuid;
            unset($education['attachment']);
            $instance = Education::firstOrCreate($education);
            $instance->save();
            array_push($educationIdList, $instance->id);
        }
        Education::where('staff_id', $uuid)->whereNotIn('id', $educationIdList)->delete();

        $careers = $request->get('careers');
        $careerIdList = [];
        foreach($careers as $career) {
            $career['staff_id'] = $uuid;
            unset($career['attachment']);
            $instance = Career::firstOrCreate($career);
            $instance->save();
            array_push($careerIdList, $instance->id);
        }
        Career::where('staff_id', $uuid)->whereNotIn('id', $careerIdList)->delete();

        $qualifications = $request->get('qualifications');
        $qualificationIdList = [];
        foreach($qualifications as $qualification) {
            $qualification['staff_id'] = $uuid;
            unset($qualification['attachment']);
            $instance = Qualification::firstOrCreate($qualification);
            $instance->save();
            array_push($qualificationIdList, $instance->id);
        }
        Qualification::where('staff_id', $uuid)->whereNotIn('id', $qualificationIdList)->delete();

        $jobTrainings = $request->get('job_trainings');
        $jobTrainingIdList = [];
        foreach($jobTrainings as $jobTraining) {
            $jobTraining['staff_id'] = $uuid;
            unset($jobTraining['attachment']);
            $instance = JobTraining::firstOrCreate($jobTraining);
            $instance->save();
            array_push($jobTrainingIdList, $instance->id);
        }
        JobTraining::where('staff_id', $uuid)->whereNotIn('id', $jobTrainingIdList)->delete();

        $yearlyCareers = $request->get('yearly_careers');
        $yearlyCareerIdList = [];
        foreach($yearlyCareers as $yearlyCareer) {
            $yearlyCareer['staff_id'] = $uuid;
            unset($yearlyCareer['attachment']);
            $instance = YearlyCareer::firstOrCreate($yearlyCareer);
            $instance->save();
            array_push($yearlyCareerIdList, $instance->id);
        }
        YearlyCareer::where('staff_id', $uuid)->whereNotIn('id', $yearlyCareerIdList)->delete();


        return $response;
    }

}
