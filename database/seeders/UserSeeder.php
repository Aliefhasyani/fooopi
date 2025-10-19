<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users = [
        ['name' => 'Ahmad Santoso', 'email' => 'ahmad.santoso@indonesia.com', 'password' => 'indonesia123'],
        ['name' => 'Siti Nurhaliza', 'email' => 'siti.nurhaliza@indonesia.com', 'password' => 'indonesia456'],

        ['name' => 'Farah Ahmad', 'email' => 'farah.ahmad@malaysia.com', 'password' => 'malaysia123'],
        ['name' => 'Hafiz Abdullah', 'email' => 'hafiz.abdullah@malaysia.com', 'password' => 'malaysia456'],

        ['name' => 'Juan Dela Cruz', 'email' => 'juan.cruz@philippines.com', 'password' => 'philippines123'],
        ['name' => 'Maria Santos', 'email' => 'maria.santos@philippines.com', 'password' => 'philippines456'],

        ['name' => 'Somchai Prasert', 'email' => 'somchai.prasert@thailand.com', 'password' => 'thailand123'],
        ['name' => 'Suda Chai', 'email' => 'suda.chai@thailand.com', 'password' => 'thailand456'],

        ['name' => 'Nguyen Van A', 'email' => 'nguyen.vana@vietnam.com', 'password' => 'vietnam123'],
        ['name' => 'Tran Thi B', 'email' => 'tran.thib@vietnam.com', 'password' => 'vietnam456'],

        ['name' => 'Haruto Tanaka', 'email' => 'haruto.tanaka@japan.com', 'password' => 'japan123'],
        ['name' => 'Yui Sato', 'email' => 'yui.sato@japan.com', 'password' => 'japan456'],

        ['name' => 'Li Wei', 'email' => 'li.wei@china.com', 'password' => 'china123'],
        ['name' => 'Wang Fang', 'email' => 'wang.fang@china.com', 'password' => 'china456'],

        ['name' => 'Tan Wei Ming', 'email' => 'tan.weiming@singapore.com', 'password' => 'singapore123'],
        ['name' => 'Chong Mei Ling', 'email' => 'chong.meiling@singapore.com', 'password' => 'singapore456'],

        ['name' => 'Khampheng Phommasone', 'email' => 'khampheng.phommasone@laos.com', 'password' => 'laos123'],
        ['name' => 'Boua Vong', 'email' => 'boua.vong@laos.com', 'password' => 'laos456'],

        ['name' => 'Kim Min Soo', 'email' => 'kim.minsoo@southkorea.com', 'password' => 'southkorea123'],
        ['name' => 'Park Ji Yeon', 'email' => 'park.jiyeon@southkorea.com', 'password' => 'southkorea456'],

        ['name' => 'Ri Yong Ho', 'email' => 'ri.yongho@northkorea.com', 'password' => 'northkorea123'],
        ['name' => 'Kim Hye Jin', 'email' => 'kim.hyejin@northkorea.com', 'password' => 'northkorea456'],

        ['name' => 'Jack Thompson', 'email' => 'jack.thompson@australia.com', 'password' => 'australia123'],
        ['name' => 'Emily Brown', 'email' => 'emily.brown@australia.com', 'password' => 'australia456'],
    ];

        foreach($users as $u){
            $u['password'] = Hash::make($u['password']);
            User::create($u);
        };
    }
}
