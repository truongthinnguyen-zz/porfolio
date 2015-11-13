<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class ArticleCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required'
        ];
    }

    public function postFillData(){
        $published_at = new Carbon($this->publish_date.' '.$this->publish_time);

        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'page_image' => $this->page_image,
            'content_raw' => $this->get('content'),
            'meta_description' => $this->meta_description,
            'published_at' => $published_at,
            'layout' => $this->layout
        ];
    }
}
