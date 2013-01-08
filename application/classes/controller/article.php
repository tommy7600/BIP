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
class Controller_article extends Controller_user
{
    protected $title = 'Artykuły';
    public $template = 'article/template';
    protected $role;

    public function before()
    {
        $this->role = array(Kohana::$config->load('roles')->get('redactor'), Kohana::$config->load('roles')->get('god'));
        parent::before();
    }

    public function action_index()
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
}