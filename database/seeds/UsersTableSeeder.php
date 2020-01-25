<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      DB::table('users')->insert([
          'name' => 'Alexis Mengual Vázquez',
          'email' => 'lexmengual@gmail.com',
          'nickname' => 'alexis_mengual',
          'password' => bcrypt('secret'),
      ]);

      DB::table('users')->insert([
          'name' => 'Rafa Juan',
          'email' => 'rjuanferragut@gmail.com',
          'nickname' => 'MetaSpike',
          'password' => bcrypt('secret'),
      ]);
    }
}
