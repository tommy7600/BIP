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

    public function action_operation()
    {
        $session = Session::instance();

        $selectedImage = isset($_POST['selectedImage']) ? $_POST['selectedImage'] : array();
        $descriptionImage = isset($_POST['description']) ? $_POST['description'] : array();

        $session->set('selectedImage', $selectedImage);
        $session->set('description', $descriptionImage);

        switch ($_POST['action'])
        {
            case 'add':
                HTTP::redirect('Galleries/add');
                break;
            case 'Select':
                HTTP::redirect('Galleries/selectImages');
                break;
            case 'Upload':
                HTTP::redirect('Galleries/uploadImages');
                break;
        }
    }

    public function action_add()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'add')
        {
            if ((isset($_POST['selectedImage']) && isset($_POST['galleryName'])))
            {
                if (empty($_POST['galleryName']))
                {
                    echo 'No title provided';
                }
                else
                {
                    $selectedImage = $_POST['selectedImage'];
                    $imageDescription = $_POST['description'];

                    $gallery = ORM::factory('Gallery');
                    $gallery->save();

                    $galleryTitle = ORM::factory('galleries_title');
                    $galleryTitle->title = $_POST['galleryName'];
                    $galleryTitle->save();

                    $galleryRevision = ORM::factory('Galleries_Revision');
                    $galleryRevision->gallery_id = $gallery->id;
                    $galleryRevision->title_id = $galleryTitle->id;
                    $galleryRevision->global_revision = 1;
                    $galleryRevision->author_id = Auth::instance()->get_user()->id;
                    $galleryRevision->date = date("Y-m-d H:i:s", time());
                    $galleryRevision->save();


                    foreach ($selectedImage as $key => $value)
                    {
                        if ($selectedImage[$key])
                        {
                            $imageDesc = ORM::factory('Images_Description');
                            $imageDesc->description = $imageDescription[$key];
                            $imageDesc->save();

                            $imageRevision = ORM::factory('Images_Revision');
                            $imageRevision->image_id = $key;
                            $imageRevision->description = $imageDesc->id;
                            $imageRevision->revision = 1;
                            $imageRevision->save();

                            $galleryImage = ORM::factory('Galleries_Image');
                            $galleryImage->gallery_revision_id = $galleryRevision->id;
                            $galleryImage->image_revision_id = $imageRevision->id;
                            $galleryImage->order = $key;
                            $galleryImage->save();
                        }
                    }
                    $session = Session::instance();
                    $session->delete('galleryImagesId');
                }
            }
        }
        else
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

            $this->template->set('selectedImage', $session->get('selectedImage'));
            $this->template->set('description', $session->get('description'));
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
                if ($files[$key]['size'] != 0)
                {
                    if (!$files[$key]['error'] && !strncmp($files[$key]['type'], 'image', strlen('image')))
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
            }

            $session->set('galleryImagesId', $galleryImagesId);
            HTTP::redirect('galleries/add');
        }
    }

    public function action_selectImages()
    {
        if (isset($_POST['selectedImage']))
        {
            $session = Session::instance();
            $galleryImagesId = $session->get('galleryImagesId');
            if ($galleryImagesId === NULL)
            {
                $galleryImagesId = array();
            }

            foreach ($_POST['selectedImage'] as $key => $value)
            {
                if (!in_array($key, $galleryImagesId))
                {
                    $galleryImagesId[] = $key;
                }
            }

            $session->set('galleryImagesId', $galleryImagesId);
            HTTP::redirect('galleries/add');
        }
        else
        {
            $storedImages = ORM::factory('image')
                    ->find_all();
            $this->template->set('images', $storedImages);
        }
    }
}
