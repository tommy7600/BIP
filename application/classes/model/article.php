<?php

class Model_Article extends ORM
{
    protected $_belongs_to = array(
      'articles_revision'   => array() 
    );
    
    protected $_has_one = array(
        'current' => array(
            'model' => 'articles_revision',
            'foreign_key' => 'id'
        )
    );
    
    protected $_has_many = array(
        'revisions' => array(
            'model' => 'articles_revision',
            'foreign_key' => 'article_id'
        )
    );
}