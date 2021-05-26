<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ( $i = 0; $i < 7; $i++ ) {
            $newpost = new Post();
            $newpost->title = $faker-> sentence();
            $newpost->slug = Str::slug( $newpost->title, '-' );
            $newpost->content = $faker-> paragraphs(4, true);
            $newpost->image = $faker-> imageUrl(640, 480, 'animals', true);
            $newpost->date = $faker-> date();
            $newpost->public = $faker-> boolean();
            $newpost->author = $faker-> name();
            $newpost->save();
        }
    }
}
