<?php

use App\Models\Role;
use App\Models\Staff;
use App\Models\User;

class StaffSeeder extends BaseSeeder
{
    /**
     * Run fake seeds - for non production environments
     *
     * @return mixed
     */
    public function runFake() {

        // Grab all roles for reference
        $roles = Role::all();

        // Get some random roles to assign to users
        $fakeRolesToAssignCount = 3;
        $fakeRolesToAssign = RoleTableSeeder::getRandomRoles($fakeRolesToAssignCount);

        $staffs = [
            [ 'dept_id'=>'001', 'name'=>'이인재', 'primary_role'=>$roles->where('name', 'admin')->first()->role_id ],
            [ 'dept_id'=>'002', 'name'=>'김영성' ],
            [ 'dept_id'=>'002', 'name'=>'이종윤' ],
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
            [ 'dept_id'=>'008', 'name'=>'장원영', 'email'=>'misha.jang@anamair.co.kr', 'primary_role'=>$roles->where('name', 'admin')->first()->role_id ],
            [ 'dept_id'=>'008', 'name'=>'홍장표' ],
        ];

        $primary_role = $roles->where('name', 'admin')->first()->role_id;

        foreach($staffs as $idx=>$staff){

            if( isset($staff['primary_role']) ) {
                $primary_role = $staff['primary_role'];
            }
            if( isset($staff['email'] )) {
                $email = $staff['email'];
            } else {
                $email = 'demo'.sprintf('%02d', $idx+1).'@demo.com';
            }
            Staff::firstOrCreate([
                'name'=>$staff['name'],
                'dept_id'=>$staff['dept_id'],
                'status'=>'active',
                'title'=>'',
                'email'=>$email
            ]);
            $user = factory(App\Models\User::class)->create([
                'email'=>$email,
                'name'=>$staff['name'],
                'password'=>'demo',
                'primary_role' => $primary_role
            ]);


            for ($j = 0; $j < count($fakeRolesToAssign); ++$j) {
                $user->roles()->save($fakeRolesToAssign->shift());
            }

            $primary_role = $roles->random()->role_id;
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
