<?php

use App\Models\Staff;

class StaffSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {
        $staffs = [
            [ 'dept_id'=>'001', 'name'=>'이인재' ],
            [ 'dept_id'=>'002', 'name'=>'김영성' ],
            [ 'dept_id'=>'003', 'name'=>'이종윤' ],
            [ 'dept_id'=>'003', 'name'=>'이빅토르' ],
            [ 'dept_id'=>'004', 'name'=>'최범규' ],
            [ 'dept_id'=>'004', 'name'=>'정선미' ],
            [ 'dept_id'=>'004', 'name'=>'차수연' ],
            [ 'dept_id'=>'004', 'name'=>'강희선' ],
            [ 'dept_id'=>'004', 'name'=>'마리아' ],
            [ 'dept_id'=>'004', 'name'=>'안유빈' ],
            [ 'dept_id'=>'005', 'name'=>'김대욱' ],
            [ 'dept_id'=>'005', 'name'=>'주용훈' ],
            [ 'dept_id'=>'005', 'name'=>'손혜승' ],
            [ 'dept_id'=>'006', 'name'=>'김월래' ],
            [ 'dept_id'=>'006', 'name'=>'박재완' ],
            [ 'dept_id'=>'006', 'name'=>'허성수' ],
            [ 'dept_id'=>'006', 'name'=>'윤장원' ],
            [ 'dept_id'=>'006', 'name'=>'장기성' ],
            [ 'dept_id'=>'006', 'name'=>'임재권' ],
            [ 'dept_id'=>'006', 'name'=>'김원익' ],
            [ 'dept_id'=>'006', 'name'=>'류은혁' ],
            [ 'dept_id'=>'006', 'name'=>'조희서' ],
            [ 'dept_id'=>'007', 'name'=>'조혜경' ],
            [ 'dept_id'=>'007', 'name'=>'권순남' ],
            [ 'dept_id'=>'007', 'name'=>'이미영' ],
            [ 'dept_id'=>'007', 'name'=>'임소윤' ],
            [ 'dept_id'=>'008', 'name'=>'장원영' ],
            [ 'dept_id'=>'008', 'name'=>'홍장표' ],
        ];
        foreach($staffs as $idx=>$staff){
            Staff::firstOrCreate([
                'name'=>$staff['name'],
                'dept_id'=>$staff['dept_id'],
                'status'=>'active',
                'title'=>'',
                'email'=>'bjkim'.sprintf('%02d', $idx+1).'@gmail.com'
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
