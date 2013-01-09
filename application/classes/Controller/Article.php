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
class Controller_Article extends Controller_User
{
    protected $title = 'Artykuły';
    public $template = 'template';
    protected $role;

    public function before()
    {
        $this->role = array(Kohana::$config->load('roles')->get('redactor'), Kohana::$config->load('roles')->get('god'));
        parent::before();
    }

    public function action_index()
    {
        $articles = ORM::factory('Article')->find_all();
        
        $this->template->articles = $articles;
    }

    public function action_show()
    {
        $id = $this->request->param('id');
        
        $article = ORM::factory('article', $id);
        
        $this->template->article = $article;        
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
}