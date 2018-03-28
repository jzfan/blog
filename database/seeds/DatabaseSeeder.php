<?php

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
        $tags_id = factory('App\Tag', 22)->create()->pluck('id');
        foreach(['character', 'scene', 'polt', 'others'] as $c) {
               factory('App\Paragraph', rand(5, 11))->create(['category' => $c])
                    ->each( function ($p) use ($tags_id) {
                        $p->tags()->attach($tags_id->random(rand(1, 5))->toArray());
                    });
        }      
    }
}
