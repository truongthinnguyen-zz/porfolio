<?php
/**
 * Created by PhpStorm.
 * User: Thin.Nguyen
 * Date: 11/13/2015
 * Time: 1:38 PM
 */

namespace App\Services;

use Michelf\MarkdownExtra;
use Michelf\SmartyPants;

class Markdowner
{
    public function toHTML($text){
        $text = $this->preTransformText($text);
        $text = MarkdownExtra::defaultTransform($text);
        $text = SmartyPants::defaultTransform($text);
        $text = $this->postTransformText($text);

        return $text;
    }

    protected function preTransformText($text){
        return $text;
    }

    protected function postTransformText($text){
        return $text;
    }
}
