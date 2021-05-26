<?php

use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Html', 'Css', 'Js', 'PHP', 'C++', 'Python', 'SQL', 'XML', 'Java'
        ];
        
        foreach ( $tags as $tag ) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug( $newTag->name, '-' );
            $newTag->save();
        }

    }
}
