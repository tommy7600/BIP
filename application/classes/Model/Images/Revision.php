<?php

class Model_Images_Revision extends ORM
{
    protected $_has_one = array(
        'image' => array(
            'model' => 'image',
            'foreign_key' => 'id'
        ),
        'description' => array(
            'model' => 'images_description',
            'foreign_key' => 'id'
        )
    );
    
    protected $_has_many = array(
      'galleries' => array(
          'model' => 'galleries_revision',
          'through' => 'galleries_images',
          'foreign_key' => 'image_revision_id',
          'far_key' => 'id'
      )  
    );
}