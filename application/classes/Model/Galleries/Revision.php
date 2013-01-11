<?php

class Model_Galleries_Revision extends ORM
{
    protected $_belongs_to = array(
        'gallery'   => array(
            'model' => 'Gallery',
            'foreign_key' => 'gallery_id'
        ),
        'title' => array(
            'model' => 'Galleries_Title',
            'foreign_key' => 'title_id'
        ),
        'author' => array(
            'model' => 'User',
            'foreign_key' => 'author_id'
        ),
        'approved_by' => array(
            'model' => 'User',
            'foreign_key' => 'approved_by_id'
        ),
    );
    
    protected $_has_many = array(
      'images' => array(
          'model' => 'Images_Revision',
          'through' => 'Galleries_Images',
          'foreign_key' => 'gallery_revision_id',
          'far_key' => 'image_revision_id'
      )  
    );
}
