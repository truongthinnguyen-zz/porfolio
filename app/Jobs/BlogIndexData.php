<?php

namespace App\Jobs;

use App\Article;
use App\Jobs\Job;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\SelfHandling;

class BlogIndexData extends Job implements SelfHandling
{
    protected $tag;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->tag){
            return $this->tagIndexData($this->tag);
        }

        return $this->normalIndexData();
    }

    protected function normalIndexData(){
        $articles = Article::with('tags')
            ->where('published_at', '<=', Carbon::now())
            ->where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->simplepaginate(config('blog.articles_per_page'));

        return [
            'title' => config('blog.title'),
            'subtitle' => config('blog.subtitle'),
            'articles' => $articles,
            'page_image' => config('blog.page_image'),
            'meta_description' => config('blog.description'),
            'reverse_direction' => false,
            'tag' => null
        ];
    }

    protected function tagIndexData($tag)
    {
        $tag = Tag::where('tag', $tag)->firstOrFail();
        $reverse_direction = (bool)$tag->reverse_direction;

        $articles = Article::where('published_at', '<=', Carbon::now())
            ->whereHas('tags', function($q) use ($tag) {
                $q->where('tag', '=', $tag->tag);
            })
            ->where('is_published', true)
            ->orderBy('published_at', $reverse_direction ? 'asc' : 'desc')
            ->simplepaginate(config('blog.articles_per_page'));

        $articles->addQuery('tag', $tag->tag);

        $page_image = $tag->page_image ?: config('blog.page_image');

        return [
            'title' => $tag->title,
            'subtitle' => $tag->subtitle,
            'articles' => $articles,
            'page_image' => $page_image,
            'tag' => $tag,
            'meta_description' => $tag->meta_description ?: config('blog.description'),
            'reverse_direction' => $reverse_direction,
        ];
    }
}
