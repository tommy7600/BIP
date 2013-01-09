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
class Controller_Auth extends Controller_Template
{
    protected $title = 'Logowanie';
    public $template = 'template';

    public function action_login()
    {
        if (Auth::instance()->logged_in())
        {
            HTTP::redirect('index');
        }

        $post = $this->request->post();
        if (isset($post['username']) && isset($post['password']))
        {
            if (Auth::instance()->login($post['username'], $post['password']))
            {
                HTTP::redirect('index');
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
        HTTP::redirect('index');
    }
}

