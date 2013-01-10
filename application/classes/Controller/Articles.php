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
        if (Valid::not_empty($_POST))
        {
            $post = $this->request->post();
            $post = array_map('trim', $post);
            $post = Validation::factory($post)
                    ->rule('Title', 'not_empty')
                    ->rule('Content', 'not_empty');
            if($post->check())
            {
                try
                {
                    $article = ORM::factory('Article');
                    $article->approved_revision_id = NULL;
                    $article->save();
                    
                    $title = ORM::factory('Articles_Title');
                    $title->title = $post['Title'];
                    $title->save();
                    
                    $content = ORM::factory('Articles_Content');
                    $content->content = $post['Content'];
                    $content->save();
                    
                    $article_rev = ORM::factory('Articles_Revision');
                    $article_rev->article_id = $article->id;
                    $article_rev->title_id = $title->id;
                    $article_rev->content_id = $content->id;
                    $article_rev->author_id = Auth::instance()->get_user();
                    $article_rev->date = time();
                    $article_rev->save();
                    
                    $this->template->messages = array('New article has been added!');
                    $this->redirect($this->request->uri());
                            
                    
                }
                catch (ORM_Validation_Exception $e)
                {
                    $this->template->errors = $e->errors();
                }
            }
            else
            {
                $this->template->errors = $post->errors('validation');
            }
        }

    }

    public function action_edit()
    {
        $id = $this->request->param('id');
        if (!Valid::numeric($id))
        {
            $this->template->articleLoaded = FALSE;
            $this->template->errors = array('Bad param or not given');
        }
        else
        {
            $article = ORM::factory('Articles_Revision')
                    ->where('article_id', '=', $id)
                    ->order_by('global_revision', 'DESC')
                    ->find()
                    ->limit(1);
            var_dump($article);
            $session = Session::instance();
            $this->template->articleLoaded = TRUE;

            $this->template->articleTitle = $article->title->title;
            $session->set('articleTitle', $article->title->title);
            $this->template->articleContent = $article->content->content;
            $session->set('articleContent', $article->content->content);
            
//            $post = $this->request->post();
//            if(Valid::not_empty($post))
//            {
//                try
//                {
//                    if($session->get('articleContent') != $post['Content'])
//                    {
//                        $content = ORM::factory('Articles_Content');
//                        $content->content = $post['Content'];
//                        $content->save();
//                        
//                        $article->content_id = $content->id;
//                    }
//                    if($session->get('articleTitle') != $post['Title'])
//                    {
//                        $title = ORM::factory(('Articles_Title'));
//                        $title->title = $post['Title'];
//                        $title->save();
//                        
//                        $article->title_id = $title->id;
//                    }
//                    
//                    if ($session->get('articleTitle') != $post['Title'] OR $session->get('articleContent') != $post['Content'])
//                    {
//                        $article->global_revision += 1;
//                        $article->save();
//                        //$this->redirect($this->request->uri());
//                    }
//                    else {
//                        $this->template->messages = array('No changes');
//                    }
//                }
//                catch (ORM_Validation_Exception $e)
//                {
//                    var_dump($e);
//                }
//            }
        }
    }

    public function action_remove()
    {
        
    }

    public function action_confirm()
    {
        
    }
}
