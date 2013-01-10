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
        if (isset(session::istance()->get('galleryImagesId')))
        {
            $galleryImagesId = session::istance()->get('galleryImagesId');
            $images = array();
            foreach ($galleryImagesId as $imageId)
            {
                $image = ORM::factory('image')
                        ->where('id', '=', $imageId)
                        ->find();
                $images[] = $image;
            }
        }
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
            if (isset(session::istance()->get('galleryImagesId')))
            {
                $galleryImagesId = session::istance()->get('galleryImagesId');
            }
            else
            {
                $galleryImagesId = array();
            }

            foreach ($files as $key => $value)
            {
                if (!$files[$key]['error'])
                {
                    $fileName = 'upload/images/' . sha1_file($files[$key]["tmp_name"] . date()) . '.' . substr($files[$key]["name"], strrpos($files[$key]["name"], '.') + 1);
                    if (!move_uploaded_file($files[$key]['tmp_name'], $fileName))
                    {
                        die('Possible upload attack.');
                    }

                    $image = ORM::factory('image');
                    $image->set('path', $fileName);
                    $image->save();

                    $galleryImagesId[] = $image->get('id');
                }
                else
                {
                    die('upload error.');
                }
            }

            session::instance()->set('galleryImagesId', $galleryImagesId);
            HTTP::redirect('galleries/add');
        }
    }

    public function action_selectImages()
    {
        
    }

}
