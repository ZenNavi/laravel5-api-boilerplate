<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Education;
use App\Models\JobTraining;
use App\Models\Qualification;
use App\Models\YearlyCareer;
use App\Transformers\BaseTransformer;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function patch($uuid, Request $request)
    {
        $response = parent::patch($uuid, $request);

        $educations = $request->get('educations');
        $educationIdList = [];
        foreach($educations as $education ) {
            $education['staff_id'] = $uuid;
            $instance = Education::firstOrCreate($education);
            $instance->save();
            array_push($educationIdList, $instance->id);
        }
        Education::where('staff_id', $uuid)->whereNotIn('id', $educationIdList)->delete();

        $careers = $request->get('careers');
        $careerIdList = [];
        foreach($careers as $career) {
            $career['staff_id'] = $uuid;
            $instance = Career::firstOrCreate($career);
            $instance->save();
            array_push($careerIdList, $instance->id);
        }
        Career::where('staff_id', $uuid)->whereNotIn('id', $careerIdList)->delete();

        $qualifications = $request->get('qualifications');
        $qualificationIdList = [];
        foreach($qualifications as $qualification) {
            $qualification['staff_id'] = $uuid;
            $instance = Qualification::firstOrCreate($qualification);
            $instance->save();
            array_push($qualificationIdList, $instance->id);
        }
        Qualification::where('staff_id', $uuid)->whereNotIn('id', $qualificationIdList)->delete();

        $jobTrainings = $request->get('job_trainings');
        $jobTrainingIdList = [];
        foreach($jobTrainings as $jobTraining) {
            $jobTraining['staff_id'] = $uuid;
            $instance = JobTraining::firstOrCreate($jobTraining);
            $instance->save();
            array_push($jobTrainingIdList, $instance->id);
        }
        JobTraining::where('staff_id', $uuid)->whereNotIn('id', $jobTrainingIdList)->delete();

        $yearlyCareers = $request->get('yearly_careers');
        $yearlyCareerIdList = [];
        foreach($yearlyCareers as $yearlyCareer) {
            $yearlyCareer['staff_id'] = $uuid;
            $instance = YearlyCareer::firstOrCreate($yearlyCareer);
            $instance->save();
            array_push($yearlyCareerIdList, $instance->id);
        }
        YearlyCareer::where('staff_id', $uuid)->whereNotIn('id', $yearlyCareerIdList)->delete();


        return $response;
    }

}
