<?php

class Model_Article extends ORM
{
    protected $_belongs_to = array(
      'current'   => array(
          'model' => 'Articles_Revision',
          'foreign_key' => 'approved_revision_id'
      ) 
    );
    
    protected $_has_many = array(
        'revisions' => array(
            'model' => 'Articles_Revision',
            'foreign_key' => 'article_id'
        )
    );
}