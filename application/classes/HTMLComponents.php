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
class HTMLComponents
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
}

?>
