<?php

class Model_Gallery extends ORM
{
    protected $_belongs_to = array(
        'current' => array(
          'model' => 'Galleries_Revision',
          'foreign_key' => 'approved_revision_id'
      )
    );
    
    protected $_has_many = array(
       'revisions' => array(
           'model' => 'Galleries_Revision',
           'foreign_key' => 'gallery_id'
       )
    );
}