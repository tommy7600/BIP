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
class Controller_Articles extends Controller_Template
{
    protected $title = 'Artykuły';
    public $template = 'template';

    public function action_index()
    {
        $articles = ORM::factory('Article')->find_all();

        $this->template->articles = $articles;
    }

    public function action_show()
    {
        $id = $this->request->param('id');

        $article = ORM::factory('Article', $id);

        $this->template->article = $article;
    }

    public function action_search()
    {
        $q = $this->request->query('q');
        
        if (isset($q))
        {            
            $articles = ORM::factory('Article')
                    ->join('articles_revisions')
                    ->on('article.approved_revision_id', '=', 'articles_revisions.id')
                    ->join('articles_titles')
                    ->on('articles_revisions.title_id', '=','articles_titles.id')
                    ->join('articles_contents')
                    ->on('articles_revisions.content_id', '=','articles_contents.id')
                    ->where('title', 'LIKE', '%' . $q . '%')
                    ->or_where('content', 'LIKE', '%' . $q . '%')
                    ->find_all();
            
            $this->template->articles = $articles;
            $this->template->q = $q;
        }
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
