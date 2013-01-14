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

    public function action_list()
    {
        $galleries = ORM::factory('Gallery')->find_all();

        $galleriesRevisions = array();
        foreach ($galleries as $gallery)
        {
            $galleriesRevisions[] = ORM::factory('Galleries_Revision')
                    ->where('gallery_id', '=', $gallery->id)
                    ->order_by('global_revision', 'DESC')
                    ->find()
                    ->limit(1);
        }

        $this->template->set('galleries', $galleriesRevisions);
    }

    public function action_show()
    {
        $this->LoadGallery();
    }

    public function action_add()
    {
        $post = $this->request->post();

        if (isset($post['galleryName']))
        {
            if (empty($_POST['galleryName']))
            {
                $this->template->error = 'No title provided';
            }
            else
            {
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
            }
        }
    }

    public function action_edit()
    {
        if (Valid::not_empty($_POST))
        {
            $post = $this->request->post();
            $this->SaveGallery();
            $session = Session::instance();
            HTTP::redirect('galleries/show/' . $session->get('galleryId'));
        }
        else
        {
            $this->LoadGallery();
        }
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
                if ($files[$key]['size'] != 0)
                {
                    if (!$files[$key]['error'] && !strncmp($files[$key]['type'], 'image', strlen('image')))
                    {
                        $fileName = 'upload/images/' . sha1($files[$key]["tmp_name"] . time()) . '.' . substr($files[$key]["name"], strrpos($files[$key]["name"], '.') + 1);
                        if (!move_uploaded_file($files[$key]['tmp_name'], $fileName))
                        {
                            $this->template->error = 'Possible upload attack';
                            break;
                        }

                        $image = ORM::factory('image');
                        $image->set('path', $fileName);
                        $image->save();
                    }
                    else
                    {
                        $this->template->error = 'Upload error';
                        break;
                    }
                }
            }

            $session = Session::instance();
            HTTP::redirect('galleries/edit/' . $session->get('galleryId'));
        }
    }

    public function action_selectImages()
    {
        if (Valid::not_empty($_POST))
        {
            $post = $this->request->post();
            $galleryNewRevision = $this->SaveGallery();
            $this->RewritePreviousRevision($post['selectedImage'], $galleryNewRevision);
            $session = Session::instance();
            $id = $session->get('galleryId');
            HTTP::redirect('galleries/edit/' . $id);
        }
        else
        {
            $storedImages = ORM::factory('image')
                    ->find_all();
            $this->template->set('images', $storedImages);
        }
    }

    private function RewritePreviousRevision(array $selectedImage, Model_Galleries_Revision $galleryNewRevision)
    {
        $session = Session::instance();
        $id = $session->get('galleryId');
        $galleryOldRevision = ORM::factory('Galleries_Revision')
                ->where('gallery_id', '=', $id)
                ->order_by('global_revision', 'DESC')
                ->find()
                ->limit(1);
        foreach ($galleryOldRevision->images->find_all() as $galleryOldImage)
        {
            $descriptionNew = ORM::factory('Images_Description');
            $descriptionNew->description = $galleryOldImage->description->description;
            $descriptionNew->save();

            $imageRevision = ORM::factory('Images_Revision');
            $imageRevision->description_id = $descriptionNew->id;
            $imageRevision->revision = 1;
            $imageRevision->image_id = $galleryOldImage->image->id;
            $imageRevision->save();

            $galleryNewImage = ORM::factory('Galleries_Image');
            $galleryNewImage->gallery_revision_id = $galleryNewRevision->id;
            $galleryNewImage->image_revision_id = $imageRevision->id;
            $galleryNewImage->save();
        }
    }

    private function SaveGallery()
    {
        $post = $this->request->post();
        $session = Session::instance();
        $id = $session->get('galleryId');
        $galleryOldRevision = ORM::factory('Galleries_Revision')
                ->where('gallery_id', '=', $id)
                ->order_by('global_revision', 'DESC')
                ->find()
                ->limit(1);

        $galleryNewTitle = ORM::factory('Galleries_Title');
        $galleryNewTitle->title = isset($post['galleryName']) ? $post['galleryName'] : $galleryOldRevision->title->title;
        $galleryNewTitle->save();

        $galleryNewRevision = ORM::factory('Galleries_Revision');
        $galleryNewRevision->gallery_id = $id;
        $galleryNewRevision->title_id = $galleryNewTitle->id;
        $galleryNewRevision->global_revision = $galleryOldRevision->global_revision + 1;
        $galleryNewRevision->author_id = Auth::instance()->get_user()->id;
        $galleryNewRevision->date = time();
        $galleryNewRevision->save();


        if (isset($post['selectedImage']))
        {
            foreach ($post['selectedImage'] as $imageId => $value)
            {
                $descriptionNew = ORM::factory('Images_Description');
                $descriptionNew->description = $post['description'][$imageId];
                $descriptionNew->save();

                $imageRevision = ORM::factory('Images_Revision');
                $imageRevision->description_id = $descriptionNew->id;
                $imageRevision->revision = 1;
                $imageRevision->image_id = $imageId;
                $imageRevision->save();

                $galleryNewImage = ORM::factory('Galleries_Image');
                $galleryNewImage->gallery_revision_id = $galleryNewRevision->id;
                $galleryNewImage->image_revision_id = $imageRevision->id;
                $galleryNewImage->save();
            }
        }

        return $galleryNewRevision;
    }

    private function LoadGallery()
    {
        $id = $this->request->param('id');
        if (!Valid::numeric($id))
        {
            $this->template->galleryLoaded = FALSE;
            $this->template->errors = array('Bad param or not given');
            return false;
        }
        else
        {
            $galleryRevision = ORM::factory('Galleries_Revision')
                    ->where('gallery_id', '=', $id)
                    ->order_by('global_revision', 'DESC')
                    ->find()
                    ->limit(1);

            $this->template->set('galleryTitle', $galleryRevision->title->title);
            $this->template->set('images', $galleryRevision->images->find_all());
            $this->template->set('galleryId', $id);
            $session = Session::instance();
            $session->set('galleryId', $id);
            return true;
        }
    }
}
