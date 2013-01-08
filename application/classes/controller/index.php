<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Template
{
    public $title = 'BIP';
    public $template = 'index/template';

    public function action_index()
    {
        $article = ORM::factory('article', 1);
        
        echo $article->current->title->title . '<br>';
        echo $article->current->content->content . '<br>';
        echo $article->current->author->username . '<br>';
        echo $article->current->approved_by->username . '<br>';
        $images = $article->current->gallery->current->images->find_all();
        
        foreach ($images as $image)
        {
            echo $image->image->path . '<br>';
        }
    
    }

} // End Welcome
