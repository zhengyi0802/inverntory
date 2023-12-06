<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userdata = array(
                  [
                      'name'        => 'system',
                      'account'     => 'system',
                      'phone'       => 'system',
                      'password'    => bcrypt('mundi8888'),
                      'role'        => UserRole::System,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => 'Admin',
                      'account'     => 'admin',
                      'phone'       => 'admin',
                      'password'    => bcrypt('12345678'),
                      'role'        => UserRole::Administrator,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '系統管理員',
                      'account'     => 'superuser',
                      'phone'       => '0912345678',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::Administrator,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '總公司業務主管',
                      'account'     => 'manager',
                      'phone'       => 'manager',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::Manager,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '總公司會計',
                      'account'     => 'accounter',
                      'phone'       => 'accounter',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::Accounter,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '總公司業務助理',
                      'account'     => 'operator',
                      'phone'       => 'operator',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::Operator,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '總公司工班',
                      'account'     => 'installer',
                      'phone'       => 'installer',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::Installer,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
                  [
                      'name'        => '總公司倉管理',
                      'account'     => 'stockmanager',
                      'phone'       => 'stockmanager',
                      'password'    => bcrypt('2wsx3edc'),
                      'role'        => UserRole::StockManager,
                      'status'      => true,
                      'created_by'  => 1,
                  ],
        );
        foreach($userdata as $user) {
            User::create($user);
        }

    }
}
