<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template
{
    public $title = 'BIP';
    public $template = 'index/template';

    public function action_index()
    {
        $article = ORM::factory('article', 1);
        
        echo $article->current_revision->title->title;
    }

} // End Welcome
