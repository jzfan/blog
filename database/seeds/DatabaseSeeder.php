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
        $categories = factory('App\Category', 10)->create();
        foreach ($categories as $category) {
            $types = factory('App\Category', rand(0, 5))->create(['parent_id' => $category->id]);
            foreach ($types as $type) {
                factory('App\Category', rand(0, 5))->create(['parent_id' => $type->id]);
            }
        }
        $parents_id = Category::select('parent_id')->get()->pluck('parent_id')->toArray();
        $parents_id = array_filter($parents_id, function ($id) {
            return $id != null;
        });
        $threads = Category::whereNotIn('id', $parents_id)->get();
        foreach ($threads as $thread) {
            factory('App\Paragraph', rand(0, 5))->create(['category_id' => $thread->id]);
        }
    }
}
