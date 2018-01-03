<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name'=>'san pham 1',
            'id_type'=>'1',
            'description'=>'mo ta'
        ]);
    }
}
