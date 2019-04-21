<?php

namespace App\Http\Controllers;

use App\Models\EvaluationSheetQuestion;
use App\Models\EvaluationSheetQuestionItem;
use Illuminate\Http\Request;
use App\Models\EvaluationSheet;

class EvaluationSheetController extends Controller
{
    /**
     * @var BaseModel The primary model associated with this controller
     */
    public static $model = EvaluationSheet::class;

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

        $questions = $request->get('questions');
        $questionIdList = [];
        foreach($questions as $qIdx=>$question) {
            $question['eval_id'] = $response->eval_id;
            $question['eval_sheet_id'] = $response->id;
            $question['sort'] = ($qIdx+1);
            $items = $question['items'];
            unset($question['items']);
            $ins_que = EvaluationSheetQuestion::firstOrCreate($question);
            // $ins_que->save();
            array_push($questionIdList, $ins_que->id);

            $itemIdList = [];
            foreach($items as $item) {
                $item['eval_id'] = $response->eval_id;
                $item['eval_sheet_id'] = $response->id;
                $item['eval_sheet_question_id'] = $ins_que->id;
                $ins_item = EvaluationSheetQuestionItem::firstOrCreate($item);
                // $ins_item->save();
                array_push($itemIdList, $ins_item->id);
            }

            EvaluationSheetQuestionItem::where('eval_sheet_question_id', $ins_que->id)->whereNotIn('id', $itemIdList)->delete();
        }

        EvaluationSheetQuestion::where('eval_sheet_id', $response->id)->whereNotIn('id', $questionIdList)->delete();

        return $response;
    }
}
