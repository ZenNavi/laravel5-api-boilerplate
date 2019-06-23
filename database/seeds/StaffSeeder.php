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
            [ 'dept_id'=>'001', 'name'=>'이인재', 'email'=>'ijlee@aerolink.co.kr', 'primary_role'=>$roles->where('name', 'executives')->first()->role_id ],
            [ 'dept_id'=>'002', 'name'=>'김영성', 'email'=>'yskim@aerolink.co.kr', 'primary_role'=>$roles->where('name', 'executives')->first()->role_id  ],
            [ 'dept_id'=>'002', 'name'=>'이종윤', 'email'=>'jylee@aerolink.co.kr', 'primary_role'=>$roles->where('name', 'executives')->first()->role_id  ],
            [ 'dept_id'=>'003', 'name'=>'이빅토르', 'email'=>'victor.lee@airastana.com' ],
            [ 'dept_id'=>'004', 'name'=>'최범규', 'email'=>'bkc@anamair.co.kr' ],
            [ 'dept_id'=>'004', 'name'=>'정선미', 'email'=>'smj@aerolink.co.kr' ],
            [ 'dept_id'=>'004', 'name'=>'차수연', 'email'=>'syc@aerolink.co.kr' ],
            [ 'dept_id'=>'004', 'name'=>'강희선', 'email'=>'hskang@aerolink.co.kr' ],
            [ 'dept_id'=>'004', 'name'=>'마리아', 'email'=>'mnt@aerolink.co.kr' ],
            [ 'dept_id'=>'004', 'name'=>'안유빈', 'email'=>'ubahn@aerolink.co.kr' ],
            [ 'dept_id'=>'005', 'name'=>'김대욱', 'email'=>'dwk@anamair.co.kr' ],
            [ 'dept_id'=>'005', 'name'=>'주용훈', 'email'=>'yhj@aerolink.co.kr' ],
            [ 'dept_id'=>'005', 'name'=>'손혜승', 'email'=>'hss@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'김월래', 'email'=>'wlkim@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'박재완', 'email'=>'jwp@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'허성수', 'email'=>'ssh@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'윤장원', 'email'=>'jwyoon@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'장기성', 'email'=>'gschang@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'임재권', 'email'=>'jklim@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'김원익', 'email'=>'wikim@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'류은혁', 'email'=>'ehryu@aerolink.co.kr' ],
            [ 'dept_id'=>'006', 'name'=>'조희서', 'email'=>'hscho@aerolink.co.kr' ],
            [ 'dept_id'=>'007', 'name'=>'조혜경', 'email'=>'hkc@aerolink.co.kr', 'primary_role'=>$roles->where('name', 'admin')->first()->role_id  ],
            [ 'dept_id'=>'007', 'name'=>'권순남', 'email'=>'snk@aerolink.co.kr' ],
            [ 'dept_id'=>'007', 'name'=>'이미영', 'email'=>'mylee@aerolink.co.kr' ],
            [ 'dept_id'=>'007', 'name'=>'임소윤', 'email'=>'sylim@aerolink.co.kr' ],
            [ 'dept_id'=>'008', 'name'=>'장원영', 'email'=>'wyj@aerolink.co.kr', 'primary_role'=>$roles->where('name', 'admin')->first()->role_id ],
            [ 'dept_id'=>'008', 'name'=>'홍장표', 'email'=>'jph@aerolink.co.kr' ],
        ];

        $primary_role = $roles->where('name', 'admin')->first()->role_id;

        foreach($staffs as $idx=>$staff){

            if( isset($staff['primary_role']) ) {
                $primary_role = $staff['primary_role'];
            } else {
                $primary_role = $roles->where('name','normal')->first()->role_id;
            }
            if( isset($staff['email'] )) {
                $email = $staff['email'];
            } else {
                $email = 'demo'.sprintf('%02d', $idx+1).'@aerolink.co.kr';
            }

            $user = factory(App\Models\User::class)->create([
                'email'=>$email,
                'name'=>$staff['name'],
                'password'=>'demo',
                'primary_role' => $primary_role
            ]);

            Staff::firstOrCreate([
                'name'=>$staff['name'],
                'user_id'=>$user['user_id'],
                'dept_id'=>$staff['dept_id'],
                'status'=>'active',
                'title'=>'',
                'email'=>$email
            ]);

            for ($j = 0; $j < count($fakeRolesToAssign); ++$j) {
                $user->roles()->save($fakeRolesToAssign->shift());
            }

            // $primary_role = $roles->random()->role_id;
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
