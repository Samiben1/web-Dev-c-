<?php

use Illuminate\Database\Seeder;

class TblCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 1, 'dish_id' => 1, 'is_ordered' => 1, 'date' => '2019-08-21']);
        DB::table('tbl_cart')->insert([ 'user_id' => 10, 'restaurant_id' => 1, 'dish_id' => 3, 'is_ordered' => 1, 'date' => '2019-07-25']);
        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 1, 'dish_id' => 1, 'is_ordered' => 1, 'date' => '2019-09-30']);
        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 1, 'dish_id' => 4, 'is_ordered' => 1, 'date' => '2019-08-10']);

        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 3, 'dish_id' => 1, 'is_ordered' => 1, 'date' => '2019-08-21']);
        DB::table('tbl_cart')->insert([ 'user_id' => 10, 'restaurant_id' => 3, 'dish_id' => 3, 'is_ordered' => 1, 'date' => '2019-07-25']);
        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 3, 'dish_id' => 1, 'is_ordered' => 1, 'date' => '2019-09-30']);
        DB::table('tbl_cart')->insert([ 'user_id' => 9, 'restaurant_id' => 3, 'dish_id' => 4, 'is_ordered' => 1, 'date' => '2019-08-10']);
    }
}
