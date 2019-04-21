<?php

use App\Models\Evaluation;
use App\Models\EvaluationSheet;
use App\Models\EvaluationSheetQuestion;
use App\Models\EvaluationSheetQuestionItem;

class EvaluationsSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {

        $evaluations = [
            ['title'=>'본인', 'detail'=>'본인 평가', 'step'=>1],// 'points'=>100],
            ['title'=>'1차', 'detail'=>'1차 평가', 'step'=>2],// 'points'=>100],
            ['title'=>'2차', 'detail'=>'2차 평가', 'step'=>3],// 'points'=>100],
            ['title'=>'3차', 'detail'=>'3차 평가', 'step'=>4],// 'points'=>100],
        ];
        $questions = [

            ['title'=>'근무태도', 'detail'=>'주어진 임무는 끝까지 해냈는가?', 'points'=>5],
            ['title'=>'근무태도', 'detail'=>'경비절감에 노력했는가?', 'points'=>5],
            ['title'=>'근무태도', 'detail'=>'부하, 동료, 상사와 협력하며 일을 했는가?', 'points'=>5],
            ['title'=>'근무태도', 'detail'=>'본사의 지시나 방침에 긍정적인 사고를 갖는가?', 'points'=>5],
            ['title'=>'근무태도', 'detail'=>'지각, 결근, 조퇴의 정도는 어떠한가?', 'points'=>5], //25

            // 인사직
            /*
            ['title'=>'업무실적', 'detail'=>'현 직급에 상응한 업무 수행이 이루어 지는가?', 'points'=>10],
            ['title'=>'업무실적', 'detail'=>'판매거래처 확보를 위하여 노력하였는가?', 'points'=>10],
            ['title'=>'업무실적', 'detail'=>'계약진행절차는 정확하며 절도 있게 처리 하고 있는가?', 'points'=>15],
            ['title'=>'업무실적', 'detail'=>'입금, 채권관리 등에 관심이 많고, 최소화를 위해 노력하는가?', 'points'=>10],
            ['title'=>'업무실적', 'detail'=>'업무상의 보고, 연락을 신속확실하게 했는가?', 'points'=>5], // 50
            */

            // 사무직
            ['title'=>'업무실적', 'detail'=>'현 직급에 상응한 업무 수행이 이루어 지는가?', 'points'=>10],
            ['title'=>'업무실적', 'detail'=>'일의 질이 안정되어 있는가?', 'points'=>15],
            ['title'=>'업무실적', 'detail'=>'정형외의 일도 소화하는가?', 'points'=>5],
            ['title'=>'업무실적', 'detail'=>'일의 처리가 빠르며 단시간에 해내는가?', 'points'=>10],
            ['title'=>'업무실적', 'detail'=>'업무상의 보고, 연락을 신속확실하게 했는가?', 'points'=>10], // 50

            ['title'=>'업무처리능력', 'detail'=>'지시받은 일을 확실하게 이해하고 즉시 처리하는가?', 'points'=>5],
            ['title'=>'업무처리능력', 'detail'=>'목적달성을 위해 노력하는 의욕이 강한가?', 'points'=>5],
            ['title'=>'업무처리능력', 'detail'=>'업무를 처리하는데 필요한 지식, 기술의 정도는 어떤가?', 'points'=>5],
            ['title'=>'업무처리능력', 'detail'=>'필요한 지식 및 업무에 대한 창의 노력에 애쓰고 있는가?', 'points'=>5],
            ['title'=>'업무처리능력', 'detail'=>'새로운 방법을 받아들여 업무개선에 애쓰고 있는가?', 'points'=>5], // 25

        ];

        $questionItems = [
            ['title'=>'최상', 'detail'=>'탁월', 'points'=>5],
            ['title'=>'상', 'detail'=>'우수', 'points'=>4],
            ['title'=>'중', 'detail'=>'양호', 'points'=>3],
            ['title'=>'하', 'detail'=>'보통', 'points'=>2],
            ['title'=>'최하', 'detail'=>'미흡', 'points'=>1],
        ];

        foreach($evaluations as $idx=>$evaluation) {
            $eval = Evaluation::firstOrCreate($evaluation);
            unset($evaluation['step']);
            $evaluation['detail'] = '2019년 '.$evaluation['detail'];
            $evaluation['eval_id'] = $eval->id;
            $evaluation['points'] = 100;
            $evaluation['eval_year'] = '2019';
            $sheet    = EvaluationSheet::firstOrCreate($evaluation);

            foreach($questions as $qIdx=>$question){
                $question['eval_id'] = $eval->id;
                $question['eval_sheet_id']= $sheet->id;
                $question['sort'] = ($qIdx + 1);
                $q = EvaluationSheetQuestion::firstOrCreate($question);
                foreach($questionItems as $iIdx=>$item){
                    $item['eval_id'] = $eval->id;
                    $item['eval_sheet_id'] = $sheet->id;
                    $item['eval_sheet_question_id'] = $q->id;
                    $item['points'] = $q->points / 5 * $item['points'];
                    $t = EvaluationSheetQuestionItem::firstOrCreate($item);
                }
            }

        }
    }

    /**
     * Run seeds to be ran only on production environments
     *
     * @return mixed
     */
    public function runProduction() {

    }

    /**
     * Run seeds to be ran on every environment (including production)
     *
     * @return mixed
     */
    public function runAlways() {

    }
}
