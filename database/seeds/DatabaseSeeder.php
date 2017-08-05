<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \Illuminate\Support\Facades\DB::table('variety')->insert([
            ['id'=>1,'name'=>'豆油','code'=>'Y'],
            ['id'=>2,'name'=>'菜油','code'=>'O'],
        ]);
        \Illuminate\Support\Facades\DB::table('variety')->insert([
            ['parent_id'=>1,'name'=>'一级豆油','code'=>'Y'],
            ['parent_id'=>1,'name'=>'三级豆油','code'=>'Y'],
            ['parent_id'=>1,'name'=>'四级豆油','code'=>'Y'],
            ['parent_id'=>2,'name'=>'一级菜籽油','code'=>'O'],
            ['parent_id'=>2,'name'=>'四级菜籽油','code'=>'O'],
            ['parent_id'=>2,'name'=>'菜籽油','code'=>'O'],
        ]);
    }
}
