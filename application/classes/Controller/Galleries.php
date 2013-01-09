<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of galleries
 *
 * @author tbula
 */
class Controller_Galleries extends Controller_Template
{

    protected $title = 'Galeria';
    public $template = 'template';

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

    public function action_uploadImages()
    {
        if (isset($_FILES['image']))
        {
            $files = Common_File::ReArrayFiles($_FILES['image']);
            foreach ($files as $key => $value)
            {
                if (!$files[$key]['error'])
                {
                    $fileName = 'upload/images/' . sha1_file($files[$key]["tmp_name"]) .'.'. substr($files[$key]["name"], strrpos($files[$key]["name"], '.') + 1);
                    if (!move_uploaded_file($files[$key]['tmp_name'], $fileName))
                    {
                        die('Possible upload attack.');
                    }
                    $image = ORM::factory('image');
                    $image->set('path', $fileName);
                    $image->save();
                }
                else
                {
                    die('upload error.');
                }
            }
        }
    }

    public function action_selectImages()
    {
        
    }

}
