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
class Controller_users extends Controller_template
{
    protected $title = 'Użytkownicy';
    public $template = 'template';

    public function action_index()
    {
        $post = $this->request->post();
        try
        {
            $query = ORM::factory('user');
            if (isset($post['email']) ||
                    isset($post['username']) ||
                    isset($post['roles']))
            {
                if (isset($post['email']) && !empty($post['email']))
                {
                    $query = $query->and_where('email', '=', $post['email']);
                }

                if (isset($post['username']) && !empty($post['username']))
                {
                    $query = $query->and_where('username', '=', $post['username']);
                }

                if (isset($post['roles']) && count($post['roles']) > 0)
                {
                    $query = $query->join('roles_users', 'LEFT')
                            ->on('id', '=', 'user_id');
                    foreach ($post['roles'] as $role)
                    {
                        $query = $query->and_where('role_id', '=', $role);
                    }
                }
            }
        }
        catch (ORM_Validation_Exception $ex)
        {
            $this->template->errors = $ex->errors('models');
        }

        $this->template->users = $query->find_all();
        $this->LoadRoles();
    }

    public function action_settings()
    {
        $user = ORM::factory('user', $this->request->param('id'));
        $this->SaveUser($user);
    }

    public function action_add()
    {
        $this->SaveUser(ORM::factory('user'));
    }

    private function LoadRoles()
    {
        $this->template->roles = ORM::factory('role')
                ->find_all()
                ->as_array('id', 'name');
        $this->template->userRole = array();
        foreach ($this->template->users as $user)
        {
            $this->template->userRole[$user->id] = $user->roles->find_all()->as_array(null, 'id');
        }
    }

    private function SaveRole(Model_User $user)
    {
        $user->remove('roles');
        if (isset($this->request->post()['role']))
        {
            $user->add('roles', $this->request->post()['role']);
        }
    }

    private function SaveUser(Model_User $user)
    {
        $extraRules = NULL;
        $this->template->content = 'users/editForm';
        $post = $this->request->post();
        if (isset($post['email']))
        {
            try
            {
                $user->email = $post['email'];
                $user->username = $post['username'];
                if (!empty($post['password']) || $this->request->action() == 'add')
                {
                    $user->password = $post['password'];

                    $extraRules = Validation::factory($post)
                            ->rule('password', 'not_empty')
                            ->rule('password', 'min_length', array(':value', 8));
                }
                $user->save($extraRules);
                $this->SaveRole($user);

                HTTP::redirect('/users');
            }
            catch (ORM_Validation_Exception $ex)
            {
                $this->template->errors = $ex->errors('models');
            }
        }

        $this->template->roles = ORM::factory('role')
                ->find_all();
        $this->template->activeRole = $user->roles->find()->id;
        $this->template->user = $user;
    }
}