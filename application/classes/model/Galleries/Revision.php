<?php

class Model_Galleries_Revision extends ORM
{
    protected $_belongs_to = array(
        'Gallery'   => array()
    );
    
    protected $_has_one = array(
        'gallery'   => array(
            'model' => 'Gallery',
            'foreign_key' => 'id'
        ),
        'title' => array(
            'model' => 'Galleries_Title',
            'foreign_key' => 'id'
        ),
        'gallery' => array(
            'model' => 'Gallery',
            'foreign_key' => 'id'
        ),
        'author' => array(
            'model' => 'User',
            'foreign_key' => 'id'
        ),
        'approved_by' => array(
            'model' => 'User',
            'foreign_key' => 'id'
        ),
    );
    
    protected $_has_many = array(
      'images' => array(
          'model' => 'Images_Revision',
          'through' => 'Galleries_Images',
          'foreign_key' => 'gallery_revision_id',
          'far_key' => 'id'
      )  
    );
}
