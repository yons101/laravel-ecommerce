<?php

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
        $this->call(ProductSeeder::class);

        DB::table('users')->insert(
            [
                [
                    'username' => 'test1',
                    'password' => '$2y$10$N57RXskaiaQzgnBTVCwOfOj3oDsfOSJQQp/kKD1WDCYi5FX6K3Daq',

                ],
                [
                    'username' => 'test2',
                    'password' => '$2y$10$SEAIo7Qo/XSNT/GD9Tym/OT7HlZ9bqsLRK3YWICJCZKoQvaZUSVay',
                ]
            ]
        );

        DB::table('roles')->insert(
            [
                [
                    'name' => 'admin'
                ],
                [
                    'name' => 'user'
                ]
            ]
        );

        DB::table('role_user')->insert(
            [
                [
                    'user_id' => 1,
                    'role_id' => 1,
                ],
                [
                    'user_id' => 2,
                    'role_id' => 2,
                ]
            ]
        );

        DB::table('profiles')->insert(
            [
                [
                    'user_id' => 1,
                ],
                [
                    'user_id' => 2,

                ]
            ]
        );

        DB::table('carts')->insert(
            [
                [
                    'user_id' => 1,
                ],
                [
                    'user_id' => 2,

                ]
            ]
        );

        DB::table('cart_product')->insert(
            [
                [
                    'cart_id' => 1,
                    'product_id' => 1,
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 2,
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 3,
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 3,
                ],
                [
                    'cart_id' => 1,
                    'product_id' => 3,
                ],

                //cart 2

                [
                    'cart_id' => 2,
                    'product_id' => 4,
                ],
                [
                    'cart_id' => 2,
                    'product_id' => 4,
                ],
                [
                    'cart_id' => 2,
                    'product_id' => 4,
                ],

            ]
        );
    }
}
