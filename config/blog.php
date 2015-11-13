<?php
/**
 * Created by PhpStorm.
 * User: Thin.Nguyen
 * Date: 11/9/2015
 * Time: 4:39 PM
 */

return [
    'title' => 'My Blog',
    'articles_per_page' => 5,
    'subtitle' => 'A clean blog written in Laravel 5.1',
    'description' => 'This is my meta description',
    'author' => 'Thin Nguyen Truong',
    'page_image' => 'home-bg.jpg',
    'posts_per_page' => 5,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'upload' => [
        'storage' => 'local',
        'webpath' => 'uploads'
    ],
];