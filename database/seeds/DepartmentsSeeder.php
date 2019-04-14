<?php

use App\Models\Department;

class DepartmentsSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {
        foreach(['회장','대표이사','KC 지점장','여객팀','화물팀','공항팀', '관리1팀', '관리2팀'] as $index=>$departname){
            Department::firstOrCreate([
                'dept_id' => sprintf('%03d', $index+1),
                'dept_name'=>$departname,
                'dept_detail'=>'',
                'dept_use_yn'=>'Y'
            ]);
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
