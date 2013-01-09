<?php

class Model_Images_Revision extends ORM
{
    protected $_has_one = array(
        'image' => array(
            'model' => 'Image',
            'foreign_key' => 'id'
        ),
        'description' => array(
            'model' => 'Images_Description',
            'foreign_key' => 'id'
        )
    );
    
    protected $_has_many = array(
      'galleries' => array(
          'model' => 'Galleries_Revision',
          'through' => 'Galleries_Images',
          'foreign_key' => 'image_revision_id',
          'far_key' => 'id'
      )  
    );
}