<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTML
 *
 * @author tbula
 */
class HTMLComponents extends Kohana_HTML
{

    public static function Alert($type, array $array, $key)
    {
        if(isset($array['_external'][$key]))
        {
            return '<div class="alert alert-' . $type . '">' . $array['_external'][$key] . '</div>';
        }
        
        if (isset($array[$key]))
        {
            return '<div class="alert alert-' . $type . '">' . $array[$key] . '</div>';
        }
    }
    
    public static function anchorDependingOnRole($controller, $action, array $params, array $roles, $title = NULL, array $attributes = NULL, $protocol = NULL, $index = TRUE)
    {
        if ((new Access())->HasAuth($controller, $action))
        {
            $uri = $controller.'/'.$action;
            foreach($params as $param)
            {
                $uri .= '/'.$param;
            }
            return parent::anchor($uri, $title, $attributes, $protocol, $index);
        }
        else
        {
            return false;
        }
    }
}

?>
