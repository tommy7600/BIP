<?php

class Model_Gallery extends ORM
{
    protected $_belongs_to = array(
        'articles_revision' => array(),
        'galleries_revision' => array()
    );
    
    protected $_has_one = array(
      'current' => array(
          'model' => 'galleries_revision',
          'foreign_key' => 'id'
      )
    );
    
    protected $_has_many = array(
       'revisions' => array(
           'model' => 'galleries_revision',
           'foreign_key' => 'gallery_id'
       )
    );
}