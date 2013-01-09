<?php

class Model_Articles_Revision extends ORM
{
    protected $_belongs_to = array(
        'Article'   => array()
    );
    
    protected $_has_one = array(
        'article'   => array(
            'model' => 'Article',
            'foreign_key' => 'id'
        ),
        'title' => array(
            'model' => 'Articles_Title',
            'foreign_key' => 'id'
        ),
        'content' => array(
            'model' => 'Articles_Content',
            'foreign_key' => 'id'
        ),
        'gallery' => array(
            'model' => 'Gallery',
            'foreign_key' => 'id'
        ),
        'author' => array(
            'model' => 'User',
            'foreign_key' => 'id'
        ),
        'approved_by' => array(
            'model' => 'User',
            'foreign_key' => 'id'
        ),
    );
}