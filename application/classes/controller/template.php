<?php

defined('SYSPATH') or die('No direct script access.');

abstract class Controller_template extends Kohana_Controller_Template
{
    protected $title;
    public $template;

    public function before()
    {
        parent::before();
        // error, info messages for app
        $this->template->messages = array();
        $this->template->errors = array();

        $this->template->query = $this->request->query();
        $this->template->post = $this->request->post();

        // views autoloader beggining
        $this->template->content = strtolower($this->request->controller() . '\\' . $this->request->action());
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
}
