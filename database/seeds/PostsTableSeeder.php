<?php

use Illuminate\Database\Seeder;
use App\Post;
use faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $newpost = new Post();
        $newpost->slug = $faker-> words(5);
        $newpost->title = $faker-> sentence();
        $newpost->content = $faker-> paragraphs(4);
        $newpost->image = $faker-> imageUrl(640, 480, 'animals', true);
        $newpost->date = $faker-> date();
        $newpost->public = $faker-> boolean();
        $newpost->user_id = $faker-> randomDigit();
    }
}
