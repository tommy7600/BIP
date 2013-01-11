<?php

class Model_Images_Revision extends ORM
{
    protected $_belongs_to = array(
        'image' => array(
            'model' => 'Image',
            'foreign_key' => 'image_id'
        ),
        'description' => array(
            'model' => 'Images_Description',
            'foreign_key' => 'description_id'
        )
    );
    
    protected $_has_many = array(
      'galleries' => array(
          'model' => 'Galleries_Revision',
          'through' => 'Galleries_Images',
          'foreign_key' => 'image_revision_id',
          'far_key' => 'gallery_revision_id'
      )  
    );
}