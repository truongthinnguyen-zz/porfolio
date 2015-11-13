<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::lists('tag')->all();
        Article::truncate();

        DB::table('article_tag_pivot')->truncate();

        factory(Article::class, 20)->create()->each(function ($article) use ($tags) {
            if(mt_rand(1, 100) <= 30){
                return;
            }

            shuffle($tags);

            $postTags = [$tags[0]];

            if(mt_rand(1, 100) <= 30){
                $postTags[] = $tags[1];
            }

            $article->syncTags($postTags);
        });
    }
}
