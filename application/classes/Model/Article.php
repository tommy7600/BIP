<?php

class Model_Article extends ORM
{
    protected $_belongs_to = array(
      'Articles_Revision'   => array() 
    );
    
    protected $_has_one = array(
        'current' => array(
            'model' => 'Articles_Revision',
            'foreign_key' => 'id'
        )
    );
    
    protected $_has_many = array(
        'revisions' => array(
            'model' => 'Articles_Revision',
            'foreign_key' => 'article_id'
        )
    );
}