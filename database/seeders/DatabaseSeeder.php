<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Store;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        $user1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create stores for user1
        $store1 = Store::create([
            'user_id' => $user1->id,
            'name' => 'John\'s Store',
            'location' => 'New York',
        ]);

        $store2 = Store::create([
            'user_id' => $user1->id,
            'name' => 'John\'s Second Store',
            'location' => 'Los Angeles',
        ]);

        // Create stores for user2
        $store3 = Store::create([
            'user_id' => $user2->id,
            'name' => 'Jane\'s Store',
            'location' => 'Chicago',
        ]);

        // Create stores for user2
        $store4 = Store::create([
            'user_id' => $user2->id,
            'name' => 'Jane\'s Store',
            'location' => 'Chicago',
        ]);

        // Create stores for user2
        $store5 = Store::create([
            'user_id' => $user2->id,
            'name' => 'Jane\'s Store',
            'location' => 'Chicago',
        ]);

        // Create stores for user2
        $store6 = Store::create([
            'user_id' => $user2->id,
            'name' => 'Jane\'s Store',
            'location' => 'Chicago',
        ]);

        // Create products for store1
        Product::create([
            'store_id' => $store1->id,
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
            'price' => 10.99,
        ]);

        Product::create([
            'store_id' => $store2->id,
            'name' => 'Product 2',
            'description' => 'Description for Product 2',
            'price' => 20.99,
        ]);

        // Create products for store2
        Product::create([
            'store_id' => $store3->id,
            'name' => 'Product 3',
            'description' => 'Description for Product 3',
            'price' => 15.99,
        ]);

        // Create products for store3
        Product::create([
            'store_id' => $store4->id,
            'name' => 'Product 4',
            'description' => 'Description for Product 4',
            'price' => 25.99,
        ]);

        Product::create([
            'store_id' => $store5->id,
            'name' => 'Product 5',
            'description' => 'Description for Product 5',
            'price' => 30.99,
        ]);

        Product::create([
            'store_id' => $store6->id,
            'name' => 'Product 5',
            'description' => 'Description for Product 5',
            'price' => 30.99,
        ]);
    }
}
