<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1, 'name'=>'Admin', 'email'=>'faisal@devsspace.com', 'password'=>'$2a$12$tr0ADN1hFYBsUTAJ2lxu5.b4GsMfxqVu1F7H/jnPnu9yn67u2kkxS', 'role'=>'admin', 'status'=>'active']
        ];
        User::insert($adminRecords);
    }
}
