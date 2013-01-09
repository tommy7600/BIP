<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author tbula
 */
class Controller_articles extends Controller_user
{
    protected $title = 'Artykuły';
    public $template = 'template';

    public function action_index()
    {
        $articles = ORM::factory('article')->find_all();

        $this->template->articles = $articles;
    }

    public function action_show()
    {
        $id = $this->request->param('id');

        $article = ORM::factory('article', $id);

        $this->template->article = $article;
    }

    public function action_search()
    {
        
    }

    public function action_add()
    {
        
    }

    public function action_edit()
    {
        
    }

    public function action_remove()
    {
        
    }

    public function action_confirm()
    {
        
    }
}