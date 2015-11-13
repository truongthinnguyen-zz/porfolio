<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'tag', 'title', 'subtitle', 'page_image', 'meta_description', 'reverse_direction'
    ];

    public function articles(){
        return $this->belongsToMany('App\Article', 'article_tag_pivot');
    }

    public static function addNeededTags(array $tags){
        if(count($tags) === 0){
            return;
        }

        $found = static::whereIn('tag', $tags)->lists('tag')->all();

        foreach(array_diff($tags, $found) as $tag){
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Subtitle for '.$tag,
                'page_image' => '',
                'meta_description' => '',
                'reverse_direction' => false
            ]);
        }
    }

    public static function layout($tag, $default = 'blog.layouts.index')
    {
        $layout = static::whereTag($tag)->pluck('layout');
        return $layout ?: $default;
    }
}
