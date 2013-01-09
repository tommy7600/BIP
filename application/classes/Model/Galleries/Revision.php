<?php

class Model_Galleries_Revision extends ORM
{
    protected $_belongs_to = array(
        'gallery'   => array()
    );
    
    protected $_has_one = array(
        'gallery'   => array(
            'model' => 'gallery',
            'foreign_key' => 'id'
        ),
        'title' => array(
            'model' => 'galleries_title',
            'foreign_key' => 'id'
        ),
        'gallery' => array(
            'model' => 'gallery',
            'foreign_key' => 'id'
        ),
        'author' => array(
            'model' => 'user',
            'foreign_key' => 'id'
        ),
        'approved_by' => array(
            'model' => 'user',
            'foreign_key' => 'id'
        ),
    );
    
    protected $_has_many = array(
      'images' => array(
          'model' => 'images_revision',
          'through' => 'galleries_images',
          'foreign_key' => 'gallery_revision_id',
          'far_key' => 'id'
      )  
    );
}
