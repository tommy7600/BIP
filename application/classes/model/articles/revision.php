<?php

class Model_Articles_Revision extends ORM
{
    protected $_belongs_to = array(
        'article'   => array()
    );
    
    protected $_has_one = array(
        'article'   => array(
            'model' => 'article',
            'foreign_key' => 'id'
        ),
        'title' => array(
            'model' => 'articles_title',
            'foreign_key' => 'id'
        ),
        'content' => array(
            'model' => 'articles_content',
            'foreign_key' => 'id'
        ),
        'gallery' => array(
            'model' => 'gallery',
            'foreign_key' => 'id'
        ),
        'author' => array(
            'model' => 'user',
            'foreign_key' => 'id'
        ),
        'approved_by' => array(
            'model' => 'user',
            'foreign_key' => 'id'
        ),
    );
}