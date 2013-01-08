<?php

defined('SYSPATH') or die('No direct script access.');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author tbula
 */
class Controller_user extends Controller_template
{
    protected $title = 'Logowanie';
    public $template = 'template';
    protected $role;

    public function action_index()
    {
        if (Auth::instance()->logged_in())
        {
            $this->RedirectLoggedUser();
        }

        $post = $this->request->post();
        if (isset($post['username']) && isset($post['password']))
        {
            if (Auth::instance()->login($post['username'], $post['password']))
            {
                $this->RedirectLoggedUser();
            }
            else
            {
                $this->template->error = 'Provieded data is not valid';
            }
        }
    }

    public function action_logout()
    {
        Auth::instance()->logout();
        HTTP::redirect('user');
    }

    public function before()
    {
        if (!Auth::instance()->logged_in() ||
                !isset($this->role))
        {
            if (strtolower($this->request->controller()) != 'user')
            {
                $this->RedirectLoggedUser();
            }
        }
        else
        {
            $user = Auth::instance()->get_user();
            $roles = $user->roles->find_all()->as_array('id', 'name');
            if (count(array_intersect($this->role, $roles)) == 0)
            {
                HTTP::redirect('user');
            }
        }

        parent::before();
    }

    private function RedirectLoggedUser()
    {
        if (Auth::instance()->logged_in(Kohana::$config->load('roles')->get('admin')))
        {
            HTTP::redirect('manageuser');
        }

        if (Auth::instance()->logged_in(Kohana::$config->load('roles')->get('god')) ||
                Auth::instance()->logged_in(Kohana::$config->load('roles')->get('redactor')))
        {
            HTTP::redirect('article');
        }
    }
}

