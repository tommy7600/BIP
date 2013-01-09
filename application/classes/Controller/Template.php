<?php

defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Template extends Kohana_Controller_Template
{
    protected $title;
    public $template;

    public function before()
    {
        parent::before();
        if (!$this->HasAuth())
        {
            die('no permission');
        }
        // error, info messages for app
        $this->template->messages = array();
        $this->template->errors = array();

        $this->template->query = $this->request->query();
        $this->template->post = $this->request->post();

        // views autoloader beginning
        $this->template->content = strtolower($this->request->controller() .DIRECTORY_SEPARATOR. $this->request->action());
    }

    public function after()
    {
        // actual load of view
        $content = Kohana::find_file('views', $this->template->content, 'php');
        
        // setting title by title property
        $this->template->title = $this->title;

        // passing content to variable
        $this->template->content = $content;

        parent::after();
    }

    private function HasAuth()
    {
        $authRoles = Kohana::$config->load('menu')
                        ->get($this->request->controller())['actions'][$this->request->action()]['roles'];
        $userRoles = array('all');
        if (Auth::instance()->logged_in())
        {
            $user = ORM::factory('user', Auth::instance()->get_user()->id);
            $userRoles = array_merge($userRoles, $user->roles->find_all()->as_array('id', 'name'));
        }

        $this->template->userRoles = $userRoles;

        if ((count(array_intersect($userRoles, $authRoles)) > 0 &&
                in_array('login', $userRoles, false)) ||
                (in_array('all', $authRoles, false)))
        {
            return true;
        }

        return false;
    }
}
