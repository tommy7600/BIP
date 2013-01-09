<?php

class Model_Gallery extends ORM
{
    protected $_belongs_to = array(
        'Articles_Revision' => array(),
        'Galleries_Revision' => array()
    );
    
    protected $_has_one = array(
      'current' => array(
          'model' => 'Galleries_Revision',
          'foreign_key' => 'id'
      )
    );
    
    protected $_has_many = array(
       'revisions' => array(
           'model' => 'Galleries_Revision',
           'foreign_key' => 'gallery_id'
       )
    );
}