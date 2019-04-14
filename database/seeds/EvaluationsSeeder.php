<?php

use App\Models\Evaluation;

class EvaluationsSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {

        $evaluations = [
            ['title'=>'본인', 'detail'=>'본인 평가', 'step'=>1],
            ['title'=>'1차', 'detail'=>'1차 평가', 'step'=>2],
            ['title'=>'2차', 'detail'=>'2차 평가', 'step'=>3],
            ['title'=>'3차', 'detail'=>'3차 평가', 'step'=>4],
        ];
        foreach($evaluations as $idx=>$evaluation) {
            Evaluation::firstOrCreate($evaluation);
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
