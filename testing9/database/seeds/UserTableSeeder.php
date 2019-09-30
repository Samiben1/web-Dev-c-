<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 'name' => 'Hungry Jacks', 'email' => 'hungryjacks@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '564-574 Ipswich Rd, Annerley QLD 4103', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Admin', 'email' => 'admin@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => null, 'user_type' => 0, 'is_approve' => null,]);
        DB::table('users')->insert([ 'name' => 'KFC', 'email' => 'kfc@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '600 Logan Rd, Greenslopes QLD 4120', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Dominos', 'email' => 'dominos@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '130 Logan Rd, Woolloongabba QLD 4102', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Subway', 'email' => 'subway@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => 'D/412 Old Cleveland Rd, Coorparoo QLD 4151', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Red Rooster', 'email' => 'redrooster@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => 'Corner Freeman and, Rosemary St, Inala QLD 4077', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Taco Bell', 'email' => 'tacobell@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '594 Ipswich Rd, Annerley QLD 4103', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Nandos', 'email' => 'nandos@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '25/264 Ipswich Rd, Woolloongabba QLD 4102', 'user_type' => 1, 'is_approve' => 1,]);
        DB::table('users')->insert([ 'name' => 'Chalana', 'email' => 'chalana@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '1607/123 Cavendish Road, Coorparoo QLD', 'user_type' => 2, 'is_approve' => null,]);
        DB::table('users')->insert([ 'name' => 'Chilini', 'email' => 'chilini@onlinefood.com', 'password' => '$2y$10$AVIZsuB.hT1A3q.TZXVNyex7jVdwklwin3ILJjPjujMHGkG83vUCi', 'address' => '2/328 Gympie Rd, Strathpine QLD 4500', 'user_type' => 2, 'is_approve' => null,]);
    }
}

