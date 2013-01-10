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
        $session = Session::instance();
        $galleryImagesId = $session->get('galleryImagesId');
        if (isset($galleryImagesId))
        {
            $images = array();
            foreach ($galleryImagesId as $imageId)
            {
                $image = ORM::factory('image')
                        ->where('id', '=', $imageId)
                        ->find()
                        ->as_array('id', 'path');
                $images[] = $image;
            }
            
            $this->template->set('images', $images);
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
            $session = Session::instance();
            $galleryImagesId = $session->get('galleryImagesId');
            if ($galleryImagesId === NULL)
            {
                $galleryImagesId = array();
            }

            foreach ($files as $key => $value)
            {
                if (!$files[$key]['error'])
                {
                    $fileName = 'upload/images/' . sha1($files[$key]["tmp_name"] . date("Y-m-d H:i:s", time())) . '.' . substr($files[$key]["name"], strrpos($files[$key]["name"], '.') + 1);
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

            $session->set('galleryImagesId', $galleryImagesId);
            HTTP::redirect('galleries/add');
        }
    }

    public function action_selectImages()
    {
        
    }
}
