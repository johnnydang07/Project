<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('products')->insert([
            'name' => 'SCRIPT RAGLAN TEE - CREAM',
            'description' => 'SCRIPT RAGLAN TEE - là chiếc áo được ráp thân áo và ống tay áo bằng cách nối theo một',
            'price' => 315000,
            'disprice' => 100000,
            'photo' => 'ao1.png',
            'quantity' => 1
        ]);
        DB::table('products')->insert([
            'name' => 'SCRIPT RAGLAN TEE - GRAY',
            'description' => 'SCRIPT RAGLAN TEE - là chiếc áo được ráp thân áo và ống tay áo bằng cách nối theo một',
            'price' => 315000,
            'disprice' => 50000,
            'photo' => 'ao1.png',
            'quantity' => 2
        ]);
        DB::table('products')->insert([
            'name' => 'SCRIPT POLO - BLACK',
            'description' => 'SCRIPT POLO - Mẫu áo POLO với thiết kế đơn giản, form áo oversize dễ phối đồ với tone',
            'price' => 378000,
            'disprice' => 150000,
            'photo' => 'ao1.png',
            'quantity' => 2
        ]);

        DB::table('categories')->insert([
            'name' => 'MEN'
        ]);
        DB::table('categories')->insert([
            'name' => 'WOMEN'
        ]);
        DB::table('categories')->insert([
            'name' => 'TOPS'
        ]);
        DB::table('categories')->insert([
            'name' => 'BOTTOMS'
        ]);
        DB::table('categories')->insert([
            'name' => 'OUTERWEAR'
        ]);
        DB::table('categories')->insert([
            'name' => 'DIFFERENECES'
        ]);

        DB::table('category_product')->insert([
            'category_id' => '1',
            'product_id' => '1'
        ]);
        DB::table('category_product')->insert([
            'category_id' => '1',
            'product_id' => '2'
        ]);
        DB::table('category_product')->insert([
            'category_id' => '1',
            'product_id' => '3'
        ]);
        DB::table('category_product')->insert([
            'category_id' => '2',
            'product_id' => '3'
        ]);
        DB::table('category_product')->insert([
            'category_id' => '2',
            'product_id' => '2'
        ]);
        DB::table('category_product')->insert([
            'category_id' => '3',
            'product_id' => '3'
        ]);
        DB::table('sizes')->insert([
            'name' => 'S'
        ]);
        DB::table('sizes')->insert([
            'name' => 'M'
        ]);
        DB::table('sizes')->insert([
            'name' => 'L'
        ]);
        DB::table('sizes')->insert([
            'name' => 'XL'
        ]);
        DB::table('comments')->insert([
            'product_id' => 1,
            'content' => 'hello'
        ]);
        DB::table('comments')->insert([
            'product_id' => 1,
            'content' => 'HeHe'
        ]);
        DB::table('comments')->insert([
            'product_id' => 2,
            'content' => 'blabla'
        ]);
        DB::table('users')->insert([
            'name' => 'huuky',
            'email' => 'huuky@gmail.com',
            'password' => bcrypt('123')
        ]);
        DB::table('users')->insert([
            'name' => 'hh',
            'email' => 'hh@gmail.com',
            'password' => bcrypt('333')
        ]);
        DB::table('payments')->insert([
           'user_id' => 1,
           'code_product' => 'asd23g',
           'product_id' => 2,
           'fullname' => 'pham huu ky',
           'email' => 'huuky@gmail.com',
           'phone' => '01231232',
           'address' => 'duong so 9 linh dong thu duc' 
        ]);
    }
}
