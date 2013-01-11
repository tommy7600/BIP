<?php

class Model_Galleries_Image extends ORM
{
    protected $_belongs_to = array(
        'image_revision' =>array (
            'model'=> 'Images_Revision',
            'foreign_key' => 'id',
            ),
        'gallery_revision'=> array(
          'model'=> 'Galleries_Revision',
            'foreign_key'=> 'id'
        ),
    );
}