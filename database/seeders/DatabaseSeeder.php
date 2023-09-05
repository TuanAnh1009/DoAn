<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Test',
                'email'=>'tuananh20417@gmail.com',
                'password'=> Hash::make('123456'),
                'level'=>0,
                'company_name'=>'TuanAnh',
                'country'=>'Hai Duong',
                'street_address'=>'Van To, Tu Ky',
                'postcode_zip'=> 10000,
                'town_city'=> 'Hai Duong',
                'phone'=>'0963773905',

            ]

        ]);

//        DB::table('users')->insert([
//            [
//            'id'=>1,
//            'name'=>'Test',
//            'email'=>'tuananh@gmail.com',
//            'password'=> Hash::make('123456'),
//            'level'=>2,
//            'company_name'=>'TuanAnh',
//            'country'=>'Hai Duong',
//            'street_address'=>'Van To, Tu Ky',
//            'postcode_zip'=> 10000,
//            'town_city'=> 'Hai Duong',
//            'phone'=>'0963773905',
//            ],
//            [
//                'id'=>2,
//                'name'=>'ABC',
//                'email'=>'test.com',
//                'password'=> Hash::make('123456'),
//                'level'=>2,
//                'company_name'=>'TuanAnh',
//                'country'=>'Hai Duong',
//                'street_address'=>'Van To, Tu Ky',
//                'postcode_zip'=> 10000,
//                'town_city'=> 'Hai Duong',
//                'phone'=>'0963773905',
//            ]
//
//        ]);
//
//        DB::table('products')->insert([
//            [
//            'id'=>1,
//            'brand_id'=>1,
//            'product_category_id'=>1,
//            'name'=>'Test',
//            'description'=>'Test description',
//            'material'=>'1',
//            'specification'=>'2',
//            'clothing_care'=>'3',
//            'price'=>100,
//            'qty'=>20,
//            'discount'=>50,
//            'weight'=>1.3,
//            'sku'=>'00012',
//            'featured'=>true,
//            'tag'=>'test',
//            ],
//            [
//                'id'=>2,
//                'brand_id'=>2,
//                'product_category_id'=>2,
//                'name'=>'Test2',
//                'description'=>'Test description2',
//                'material'=>'1',
//                'specification'=>'2',
//                'clothing_care'=>'3',
//                'price'=>100,
//                'qty'=>20,
//                'discount'=>50,
//                'weight'=>1.3,
//                'sku'=>'00012',
//                'featured'=>false,
//                'tag'=>'test2',
//            ],
//            [
//                'id'=>3,
//                'brand_id'=>2,
//                'product_category_id'=>2,
//                'name'=>'Test3',
//                'description'=>'Test description3',
//                'material'=>'1',
//                'specification'=>'2',
//                'clothing_care'=>'3',
//                'price'=>100,
//                'qty'=>20,
//                'discount'=>50,
//                'weight'=>1.3,
//                'sku'=>'00012',
//                'featured'=>true,
//                'tag'=>'test',
//            ]
//        ]);
//
//        DB::table('brands')->insert([
//            [
//            'id'=>1,
//            'name'=>'Brand Test',
//            ],
//            [
//                'id'=>2,
//                'name'=>'Brand Test 2',
//            ]
//        ]);
//
//        DB::table('product_categories')->insert([
//            [
//                'id'=>1,
//                'name'=>'Category Test',
//                'avatar' => 'Harry_tee.webp',
//                'description' => 'A style for every brother.',
//                'content' => 'Denim doesn’t have to be deadly. Our collection of ethical jeans takes care of the planet, and the people who make them, without compromising on style. MUD sets the standard with their circular designs made from a blend of recycled and organic cotton. Knowledge Cotton Apparel adds the classic styles made from a sturdy, organic selvedge denim. With everything from skinny to a relaxed wide fit, there’s a pair for every brother’s preference.
//At the bottom of each product you’ll find a footprint, detailing the jeans’ ethical and sustainable credentials.'
//            ],
//            [
//                'id'=>2,
//                'name'=>'Category Test2',
//                'avatar' => 'Jeans_smaller.webp',
//                'description' => 'Test description',
//                'content' => 'Test content'
//            ]
//        ]);
//
//        DB::table('product_images')->insert([
//            [
//            'id'=>1,
//            'product_id'=>1,
//            'path'=>'Heavyflannelstripedovershirt1sq.png'
//            ],
//            [
//            'id'=>2,
//            'product_id'=>2,
//            'path'=>'Relaxedcheckedshirt1.png'
//            ],
//            [
//            'id'=>3,
//            'product_id'=>1,
//            'path'=>'Relaxedcheckedshirt1.png'
//            ],
//            [
//                'id'=>4,
//                'product_id'=>3,
//                'path'=>'T-Shirt_heather_grey.jpg'
//            ]
//
//        ]);
//
//        DB::table('product_details')->insert([
//            [
//                'id'=>1,
//                'product_id'=>'1',
//                'color' => 'red',
//                'size' => 's',
//                'qty' => '10'
//            ],
//            [
//                'id'=>2,
//                'product_id'=>'1',
//                'color' => 'green',
//                'size' => 's',
//                'qty' => '10'
//            ]
//        ]);
    }
}
