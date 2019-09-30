<?php

use Illuminate\Database\Seeder;

class TblDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Vegan Cheese Burger', 'd_prise' => 11, 'd_photo' => 'products_images/1.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Angry Whooper', 'd_prise' => 14, 'd_photo' => 'products_images/2.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'The Aussie', 'd_prise' => 12, 'd_photo' => 'products_images/3.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Ultimate Double Whopper', 'd_prise' => 18, 'd_photo' => 'products_images/4.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Double Whopper', 'd_prise' => 15, 'd_photo' => 'products_images/5.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Tendercrisp Caesar', 'd_prise' => 9, 'd_photo' => 'products_images/6.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 1,'d_name' => 'Grilled Chicken Peri Peri', 'd_prise' => 14, 'd_photo' => 'products_images/7.png' ]);

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 3,'d_name' => 'Zinger Stacker Combo', 'd_prise' => 11, 'd_photo' => 'products_images/11.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 3,'d_name' => 'Zinger Stacker Burger', 'd_prise' => 14, 'd_photo' => 'products_images/9.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 3,'d_name' => 'Original Fillet Burger', 'd_prise' => 12, 'd_photo' => 'products_images/10.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 3,'d_name' => 'Kentucky Burger', 'd_prise' => 18, 'd_photo' => 'products_images/8.png' ]);

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 4,'d_name' => 'The Big Margherita', 'd_prise' => 11, 'd_photo' => 'products_images/12.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 4,'d_name' => 'The Big Cheese', 'd_prise' => 14, 'd_photo' => 'products_images/13.png' ]);
        DB::table('tbl_dish')->insert([ 'restaurant_id' => 4,'d_name' => 'THe Big Pepperoni & Sausage', 'd_prise' => 12, 'd_photo' => 'products_images/14.png' ]);

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 5,'d_name' => 'Chicken Classic', 'd_prise' => 20, 'd_photo' => 'products_images/15.png' ]); 

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 6,'d_name' => 'Hangry Family Meal', 'd_prise' => 11, 'd_photo' => 'products_images/16.png' ]);  

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 7,'d_name' => 'Crunchwrap Supreme', 'd_prise' => 12, 'd_photo' => 'products_images/17.png' ]);

        DB::table('tbl_dish')->insert([ 'restaurant_id' => 8,'d_name' => '$11 WTF', 'd_prise' => 16, 'd_photo' => 'products_images/18.png' ]);
    }
}
