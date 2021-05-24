<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Post;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::All();
        foreach ( $posts as $post ) {

            if ( $post->public == true ) {
                for ( $i = 0; $i < rand( 0, 3 ); $i++ ) {
                    $newcomment = new Comment();
                    $newcomment->content = $faker-> sentences(4, true);
                    $newcomment->time = $faker-> date();
                    $newcomment->author = $faker-> name();
                    $newcomment->post_id = $post->id;
                    $newcomment->save();
            }
            }
        }
    }
}
