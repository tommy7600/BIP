<?php defined('SYSPATH') or die('No direct script access.');

class Access
{
    public function HasAuth($controller, $action)
    {
        $authRoles = Kohana::$config->load('menu')->get(ucfirst($controller))['actions'][$action]['roles'];
        
        $userRoles = $this->GetUserRoles();
        
        if ((count(array_intersect($userRoles, $authRoles)) > 0 &&
                in_array('login', $userRoles, false)) ||
                (in_array('all', $authRoles, false)))
        {
            return true;
        }

        return false;
    }
    
    public function GetUserRoles()
    {
        $userRoles = array('all');
        if (Auth::instance()->logged_in())
        {
            $user = ORM::factory('user', Auth::instance()->get_user()->id);
            $userRoles = array_merge($userRoles, $user->roles->find_all()->as_array('id', 'name'));
        }

        return $userRoles;
    }
}