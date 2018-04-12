<?php

use App\Blog;
use App\Category;
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
        factory(Category::class, 3)->create()
                ->each( function ($root) {
                    factory(Category::class, 2)->create(['parent_id' => $root->id])
                        ->each( function ($second) {
                            if (rand(0, 1) === 0) {
                                factory(Blog::class, rand(11,22))->create(['category_id' => $second->id]);
                            } else {
                               factory(Category::class, 2)->create(['parent_id' => $second->id])
                                    ->each( function ($third) {
                                        factory(Blog::class, rand(11,22))->create(['category_id' => $third->id]);
                                    });
                            }
                        });
                });
    }
}
